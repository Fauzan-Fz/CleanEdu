# Panduan Lengkap Snowflake ID - CleanEdu

> Dokumentasi ini untuk tim developer CleanEdu (Backend & Frontend)

---

## 📋 Daftar Isi

1. [Apa itu Snowflake ID?](#1-apa-itu-snowflake-id)
2. [Setup untuk Tim](#2-setup-untuk-tim)
3. [Implementasi Backend (Laravel)](#3-implementasi-backend-laravel)
4. [Guideline Frontend](#4-guideline-frontend)
5. [API Contracts](#5-api-contracts)
6. [FAQ & Troubleshooting](#6-faq--troubleshooting)
7. [Menambahkan Tabel Baru](#7-menambahkan-tabel-baru-dengan-snowflake-id)

---

## 1. Apa itu Snowflake ID?

### Konsep Dasar

Snowflake ID adalah sistem pembuatan ID unik yang **terdistribusi** dan **berbasis waktu**.

| Karakteristik | Penjelasan |
|---------------|------------|
| **Format** | 64-bit integer (BIGINT) |
| **Panjang** | 18-19 digit angka |
| **Sortable** | Bisa diurutkan berdasarkan waktu pembuatan |
| **Unik** | Tidak bentrok antar server/database |
| **Generate** | Di aplikasi, tanpa query database |

### Struktur Snowflake ID

```
1799787342933524480 (19 digit)
└─┬─┘└──────┬──────┘└┬┘└──┬──┘
  │         │        │    └─ Sequence (12 bits)
  │         │        └────── Worker ID (10 bits)
  │         └─────────────── Timestamp (41 bits)
  └───────────────────────── Sign (1 bit)
```

### Kenapa Kita Pakai Snowflake?

1. **Distributed-Ready** → Bisa deploy ke multiple server tanpa bentrok ID
2. **No Single Point of Failure** → Database down pun tetap bisa generate ID
3. **Performance** → Insert lebih cepat (tidak wait ID dari DB)
4. **Sortable** → ID besar = data baru, ID kecil = data lama

### Perbandingan dengan Auto-Increment

| Aspek | Auto-Increment | Snowflake ID |
|-------|----------------|--------------|
| Database Dependency | Butuh koneksi DB | Generate di aplikasi |
| Sequential | Berurutan (1,2,3) | Berbasis waktu |
| Multi-Server | Risk duplicate | Aman untuk distributed |
| Size | BIGINT (8 bytes) | BIGINT (8 bytes) |

---

## 2. Setup untuk Tim

### Alur Kerja Setup

```
Fauzan (Backend Lead)
    │
    ├── Install package
    ├── Buat trait & update model
    ├── Update migration
    ├── Commit & push ke repo
    │
    ▼
Teman (Frontend/Backend)
    │
    ├── git pull / git clone
    ├── composer install
    ├── php artisan migrate
    └── Ready to develop!
```

### Yang Sudah Termasuk di Repo

Setelah Fauzan setup dan push, teman cukup:

```bash
# 1. Pull/Clone repo
git pull origin main
# atau
git clone <repo-url>

# 2. Install dependencies (termasuk package Snowflake!)
composer install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Migrate database
php artisan migrate

# 5. Jalankan server
php artisan serve
```

**Package Snowflake otomatis terinstall** karena sudah masuk `composer.json` dan `composer.lock`.

### File yang Akan Dimodifikasi

File ini akan berubah setelah setup Snowflake:

```
composer.json              ← Tambah package requirement
composer.lock              ← Lock version package
app/Traits/HasSnowflake.php ← Trait baru (create)
app/Models/User.php        ← Apply trait
app/Http/Resources/        ← API resources (create/update)
database/migrations/       ← Update schema (kalau fresh)
```

### Catatan Penting untuk Tim

> **Teman cukup `composer install`** → Package Snowflake otomatis terdownload.
> 
> **Tidak perlu setup manual lagi** karena semua konfigurasi sudah di repo.

---

## 3. Implementasi Backend (Laravel)

### Step 1: Install Package

```bash
composer require godruoyi/php-snowflake
```

### Step 2: Buat Trait Reusable

File: `app/Traits/HasSnowflake.php`

```php
<?php

namespace App\Traits;

trait HasSnowflake
{
    protected static function bootHasSnowflake()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $snowflake = new \Godruoyi\Snowflake\Snowflake(1, 1);
                $model->{$model->getKeyName()} = $snowflake->id();
            }
        });
    }
}
```

> **Penting:** Jangan taruh `$incrementing` atau `$keyType` di trait! Taruh di Model langsung untuk hindari PHP trait conflict.

### Step 3: Update Model User

File: `app/Models/User.php`

```php
<?php

namespace App\Models;

use App\Traits\HasSnowflake;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, HasSnowflake, Notifiable;

    // WAJIB: Definisi di Model, bukan di Trait!
    protected $keyType = 'int';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

> **Catatan:** `protected $keyType = 'int'` dan `public $incrementing = false` harus ditulis langsung di Model class, bukan di dalam trait.

### Step 4: Update Migration

**Kasus A: Project Fresh (Belum ada data)**

File: `database/migrations/0001_01_01_000000_create_users_table.php`

```php
Schema::create('users', function (Blueprint $table) {
    $table->unsignedBigInteger('id')->primary();  // Ubah dari $table->id()
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```

**Kasus B: Sudah ada data (Migration Alter)**

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Backup data dulu!
        // Hilangkan auto-increment
        DB::statement('ALTER TABLE users MODIFY id BIGINT UNSIGNED NOT NULL');
        
        // Generate Snowflake ID untuk data existing
        // ... (script migration data)
    }
};
```

### Step 5: Buat API Resource

File: `app/Http/Resources/UserResource.php`

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,          // ✅ Cast ke string!
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
```

### Step 6: Controller Example

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return UserResource::collection($users);
    }

    public function show(string $id)  // Parameter sebagai string
    {
        $user = User::find((int) $id);  // Cast ke int untuk query
        
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        // ID auto-generate, tidak perlu kirim dari frontend
        $user = User::create($request->validated());
        
        return new UserResource($user);
    }
}
```

### Testing Backend

```bash
php artisan tinker

# Test create user
>>> $user = User::create(['name' => 'Test', 'email' => 'test@test.com', 'password' => 'password']);
>>> $user->id
=> 1799787342933524480  // Angka 19 digit = berhasil!

# Test API
curl http://localhost:8000/api/users
```

---

## 4. Guideline Frontend

### Masalah Utama: JavaScript Number Precision

JavaScript hanya bisa handle integer sampai:
```
9,007,199,254,740,991 (16 digit)
```

Snowflake ID:
```
1,799,787,342,933,524,480 (19 digit) ← Lebih besar!
```

**Demonstrasi Problem:**

```javascript
// ❌ SALAH - Langsung pakai number
const id = 1799787342933524480;
console.log(id); // 1799787342933524500 (4 digit berubah!)

// ✅ BENAR - Pakai string
const id = "1799787342933524480";
console.log(id); // "1799787342933524480" (benar!)
```

### Aturan untuk Frontend

#### 1. Interface/Type: ID selalu `string`

```typescript
// types/user.ts

// ✅ Benar
export interface User {
  id: string;  // String!
  name: string;
  email: string;
}

// ❌ Salah
export interface User {
  id: number;  // Jangan!
  name: string;
  email: string;
}
```

#### 2. API Response Handling

```typescript
// API akan return ID sebagai string
const response = await fetch('/api/users/1799787342933524480');
const data = await response.json();

// data.id sudah string, langsung pakai
console.log(typeof data.id); // "string"
console.log(data.id);        // "1799787342933524480"
```

#### 3. React Component Example

```typescript
import React from 'react';

interface User {
  id: string;  // String!
  name: string;
  email: string;
}

interface UserCardProps {
  user: User;
  onDelete: (id: string) => void;  // Parameter string!
}

export const UserCard: React.FC<UserCardProps> = ({ user, onDelete }) => {
  return (
    <div className="user-card">
      <h3>{user.name}</h3>
      <p>ID: {user.id}</p>  // Langsung display
      <button onClick={() => onDelete(user.id)}>  // Pass string
        Delete
      </button>
    </div>
  );
};
```

#### 4. URL Routing

```typescript
// React Router
import { useParams } from 'react-router-dom';

const UserDetail = () => {
  const { id } = useParams<{ id: string }>();  // String!
  
  useEffect(() => {
    if (id) {
      fetchUser(id);  // Pass sebagai string
    }
  }, [id]);
  
  return <div>User ID: {id}</div>;
};
```

#### 5. State Management

```typescript
// Zustand example
interface UserStore {
  users: User[];
  selectedUserId: string | null;  // String!
  selectUser: (id: string) => void;
  getUserById: (id: string) => User | undefined;
}

export const useUserStore = create<UserStore>((set, get) => ({
  users: [],
  selectedUserId: null,
  selectUser: (id) => set({ selectedUserId: id }),
  getUserById: (id) => get().users.find(user => user.id === id),
}));
```

#### 6. Local Storage

```typescript
// ✅ Benar - Simpan sebagai string
localStorage.setItem('currentUserId', user.id);

// Ambil kembali
const userId = localStorage.getItem('currentUserId');  // string | null
if (userId) {
  fetchUser(userId);  // Langsung pakai
}

// ❌ Jangan convert ke number!
const wrongId = Number(localStorage.getItem('currentUserId'));  // CORRUPT!
```

### Checklist Frontend

- [ ] Interface: `id: string` bukan `number`
- [ ] Tidak ada `Number(id)` atau `parseInt(id)`
- [ ] URL params handle sebagai string
- [ ] State management store sebagai string
- [ ] Local storage simpan sebagai string
- [ ] Display langsung tanpa formatting

---

## 5. API Contracts

### Standard Response Format

```json
{
  "data": {
    "id": "1799787342933524480",  // String!
    "name": "John Doe",
    "email": "john@example.com",
    "created_at": "2024-01-15T10:30:00.000000Z"
  }
}
```

### Endpoints

#### GET /api/users/{id}

**Request:**
```http
GET /api/users/1799787342933524480
Accept: application/json
```

**Response (200):**
```json
{
  "data": {
    "id": "1799787342933524480",
    "name": "John Doe",
    "email": "john@example.com",
    "created_at": "2024-01-15T10:30:00.000000Z"
  }
}
```

#### POST /api/users

**Request:**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "securepassword123"
}
```

> ⚠️ **Tidak perlu kirim `id`** - Backend generate otomatis

**Response (201):**
```json
{
  "data": {
    "id": "1799787342933524480",
    "name": "John Doe",
    "email": "john@example.com",
    "created_at": "2024-01-15T10:30:00.000000Z"
  }
}
```

### Foreign Key di Response

```json
{
  "data": {
    "id": "1799787342933524480",
    "name": "John Doe",
    "posts": [
      {
        "id": "9876543210987654321",
        "user_id": "1799787342933524480",  // FK juga string
        "title": "My Post"
      }
    ]
  }
}
```

---

## 6. FAQ & Troubleshooting

### Q1: Kenapa ID di JavaScript jadi beda/potong?

**Jawab:** JavaScript Number hanya support sampai 2^53-1. Snowflake ID lebih besar.

**Solusi:** Backend return ID sebagai **string**, Frontend jangan convert ke Number.

---

### Q2: Gimana sorting/filter berdasarkan waktu?

Snowflake ID sudah sortable by time:

```php
// Newest first
$users = User::orderBy('id', 'desc')->get();

// Oldest first
$users = User::orderBy('id', 'asc')->get();
```

---

### Q3: Bisa dapat timestamp dari Snowflake ID?

```php
$snowflake = app(\Godruoyi\Snowflake\Snowflake::class);
$parsed = $snowflake->parse(1799787342933524480);

// Result:
// ['timestamp' => 1705315800000, 'workerId' => 1, 'datacenterId' => 1, 'sequence' => 0]
```

---

### Q4: Kenapa ID kadang negatif?

**Penyebab:** Integer overflow atau tipe data salah.

**Solusi:** 
- Migration: pakai `unsignedBigInteger('id')`
- PHP: handle sebagai integer 64-bit
- JS: selalu kirim/terima sebagai string

---

### Q5: Duplicate ID?

**Penyebab:** Worker ID sama di multiple server.

**Solusi:** Set Worker ID unik per server di `.env`:
```env
# Server 1
SNOWFLAKE_WORKER_ID=1

# Server 2
SNOWFLAKE_WORKER_ID=2
```

---

### Error: "Data too long for column 'id'"

**Fix:** Migration pakai `unsignedBigInteger`, bukan `integer`.

```php
// ❌ Salah
$table->integer('id')->primary();

// ✅ Benar
$table->unsignedBigInteger('id')->primary();
```

---

### Error: "Foreign key constraint fails"

**Fix:** Tipe data FK harus sama dengan PK.

```php
// Parent
$table->unsignedBigInteger('id')->primary();

// Child (FK)
$table->unsignedBigInteger('user_id');  // Sama!
$table->foreign('user_id')->references('id')->on('users');
```

---

## 📞 Quick Reference

### Type Mapping

| System | Type |
|--------|------|
| MySQL | `BIGINT UNSIGNED` |
| PHP | `int` (64-bit) |
| JavaScript | `string` |
| JSON | `string` |
| TypeScript | `string` |

### Checklist Implementasi

**Backend:**
- [ ] Package terinstall
- [ ] Trait `HasSnowflake` dibuat
- [ ] Model pakai trait
- [ ] Migration pakai `unsignedBigInteger`
- [ ] API Resource cast ID ke string

**Frontend:**
- [ ] Interface: `id: string`
- [ ] Tidak ada convert ke Number
- [ ] State management pakai string

---

## 🚀 Timeline Implementasi

| Phase | Task | Durasi |
|-------|------|--------|
| **Fase 1** | Install package, buat trait | 30 menit |
| **Fase 2** | Update model & migration | 30 menit |
| **Fase 3** | Update API resources | 1 jam |
| **Fase 4** | Testing backend | 1 jam |
| **Fase 5** | Sync dengan frontend | 30 menit |
| **Fase 6** | Integration test | 1 jam |

**Total: ~1 hari kerja**

---

## 📝 Catatan untuk Tim

> **Backend Lead (Fauzan):** Setup Snowflake, commit ke repo.
> 
> **Teman Developer:** Cukup `composer install` setelah pull.
> 
> **Semua:** Baca guideline frontend untuk handle ID sebagai string.

---

---

## 7. Menambahkan Tabel Baru dengan Snowflake ID

Setelah setup awal selesai, semua tabel baru yang butuh Snowflake ID mengikuti pola yang sama.

### Workflow Tabel Baru

```
1. Buat Migration
      ↓
2. Buat Model (pakai trait HasSnowflake)
      ↓
3. Buat API Resource (cast ID ke string)
      ↓
4. php artisan migrate
      ↓
5. Selesai!
```

---

### Step 1: Buat Migration

```bash
php artisan make:migration create_courses_table
```

**Template Migration:**

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            // ✅ Primary key pakai unsignedBigInteger (tidak auto-increment)
            $table->unsignedBigInteger('id')->primary();
            
            $table->string('title');
            $table->text('description')->nullable();
            
            // Kalau ada foreign key ke tabel Snowflake lain:
            // $table->unsignedBigInteger('user_id');  // Sama dengan users.id
            // $table->foreign('user_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
```

> **Catatan:** Gunakan `$table->unsignedBigInteger('id')->primary()` bukan `$table->id()`

---

### Step 2: Buat Model

```bash
php artisan make:model Course
```

**File: `app/Models/Course.php`**

```php
<?php

namespace App\Models;

use App\Traits\HasSnowflake;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasSnowflake;

    // WAJIB: Definisi di Model, bukan di Trait!
    protected $keyType = 'int';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        // 'user_id',  // Kalau ada FK
    ];

    // Relasi ke User (tabel Snowflake lain)
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
```

---

### Step 3: Buat API Resource

**File: `app/Http/Resources/CourseResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,          // ✅ Cast ke string
            'title' => $this->title,
            'description' => $this->description,
            // 'user_id' => (string) $this->user_id,  // FK juga string
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
```

---

### Step 4: Migrate

```bash
php artisan migrate
```

**Selesai!** Tabel baru sudah pakai Snowflake ID.

---

### Foreign Key ke Tabel Snowflake

**Contoh:** Tabel `enrollments` dengan FK ke `courses` dan `users` (keduanya Snowflake)

**Migration:**
```php
Schema::create('enrollments', function (Blueprint $table) {
    $table->unsignedBigInteger('id')->primary();  // Snowflake ID
    
    // Foreign keys - tipe data SAMA dengan tabel parent
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('course_id');
    
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
    
    $table->string('status')->default('active');
    $table->timestamps();
});
```

**Model:**
```php
class Enrollment extends Model
{
    use HasFactory, HasSnowflake;

    // WAJIB: Definisi di Model, bukan di Trait!
    protected $keyType = 'int';
    public $incrementing = false;

    protected $fillable = ['user_id', 'course_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
```

**Resource:**
```php
class EnrollmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,
            'user_id' => (string) $this->user_id,      // FK sebagai string
            'course_id' => (string) $this->course_id,  // FK sebagai string
            'status' => $this->status,
            'user' => new UserResource($this->whenLoaded('user')),
            'course' => new CourseResource($this->whenLoaded('course')),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
```

---

### Checklist Tabel Baru

- [ ] Migration: `$table->unsignedBigInteger('id')->primary()`
- [ ] Model: `use HasSnowflake`
- [ ] Model: `protected $keyType = 'int'` (langsung di class Model)
- [ ] Model: `public $incrementing = false` (langsung di class Model)
- [ ] Resource: `'id' => (string) $this->id`
- [ ] FK: Tipe `unsignedBigInteger` (sama dengan parent)
- [ ] FK: Cast ke string di resource: `'user_id' => (string) $this->user_id`
- [ ] Run `php artisan migrate`

---

### Aturan Emas

| Aspek | Aturan |
|-------|--------|
| **Primary Key** | `unsignedBigInteger('id')->primary()` |
| **Foreign Key** | `unsignedBigInteger('xxx_id')` - sama dengan PK |
| **Model** | Selalu `use HasSnowflake` |
| **API Resource** | Selalu cast ke string: `(string) $this->id` |
| **Relasi** | Berfungsi normal seperti Eloquent biasa |

---

### Perbedaan dengan Tabel Laravel Internal

| Tabel | ID Type | Keterangan |
|-------|---------|------------|
| `users`, `courses`, `posts` | Snowflake | Tabel bisnis/custom |
| `jobs`, `failed_jobs` | Auto-increment | Internal Laravel (biarkan default) |
| `sessions`, `cache` | String/Custom | Internal Laravel (biarkan default) |
| `migrations` | Auto-increment | Laravel system table |

> **Note:** Hanya tabel bisnis/custom yang pakai Snowflake. Tabel internal Laravel tetap pakai default mereka.

---

## 📞 Quick Reference

### Command Cheat Sheet

```bash
# Buat tabel baru
php artisan make:migration create_nama_tabel_table
php artisan make:model NamaModel
php artisan make:resource NamaResource

# Migrate
php artisan migrate

# Rollback (kalau ada error)
php artisan migrate:rollback

# Fresh start (hati-hati, data hilang!)
php artisan migrate:fresh
```

### Template Cepat

**Migration:**
```php
$table->unsignedBigInteger('id')->primary();
```

**Model:**
```php
use HasSnowflake;

protected $keyType = 'int';
public $incrementing = false;
```

**Resource:**
```php
'id' => (string) $this->id,
```

---

## 📝 Catatan Penting

1. **Semua tabel bisnis pakai Snowflake** untuk konsistensi
2. **Tabel internal Laravel** (jobs, sessions, dll) biarkan default
3. **Foreign key** harus sama tipe dengan primary key
4. **API resource** selalu cast ke string untuk JS compatibility
5. **Teman developer** langsung bisa pakai setelah Anda commit

---

*End of Documentation*
