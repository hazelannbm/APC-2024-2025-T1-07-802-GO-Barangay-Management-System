public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('gender');
        $table->integer('age');
        $table->date('birthdate');
        $table->string('address');
        $table->string('civil_status');
        $table->string('religion')->nullable();
        $table->string('spouse_name')->nullable();
        $table->string('siblings_name')->nullable();
        $table->string('children_name')->nullable();
        $table->string('valid_id');
        // Remove the 'name' column if it exists
        $table->dropColumn('name');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'age',
            'birthdate',
            'address',
            'civil_status',
            'religion',
            'spouse_name',
            'siblings_name',
            'children_name',
            'valid_id'
        ]);
        $table->string('name'); // Add back the name column
    });
}