use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            // ...other seeders...
        ]);

        Role::create(['name' => 'QUALITY']);
    }
}
