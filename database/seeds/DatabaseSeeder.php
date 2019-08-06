<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'middlename' => 'Aa',
            'role_id' => '1',
            'is_active' => '1',
            'email' => 'admin@admin.com',
            'mobile' => '09111111111',
            'password' => bcrypt('admin2019'),
            'birthday' => date('Y-m-d', strtotime('10/1/1992')),
            'gender' => 'Male',
            'address' => 'Tarlac'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Teacher',
            'lastname' => 'Teacher',
            'middlename' => 'T',
            'role_id' => '2',
            'is_active' => '1',
            'email' => 'teacher@teacher.com',
            'mobile' => '09111111111',
            'password' => bcrypt('teacher2019'),
            'birthday' => date('Y-m-d', strtotime('10/1/1992')),
            'gender' => 'Male',
            'address' => 'Tarlac'
        ]);

        // Add Grade Levels
        // id = 1
        DB::table('grade_levels')->insert([
            'name' => 'Grade 7',
            'description' => 'Grade 7...'
        ]);

        // id = 2
        DB::table('grade_levels')->insert([
            'name' => 'Grade 8',
            'description' => 'Grade 8...'
        ]);

        // id = 3
        DB::table('grade_levels')->insert([
            'name' => 'Grade 9',
            'description' => 'Grade 9...'
        ]);

        // id = 4
        DB::table('grade_levels')->insert([
            'name' => 'Grade 10',
            'description' => 'Grade 10...'
        ]);

        // id = 5
        DB::table('grade_levels')->insert([
            'name' => 'Grade 11',
            'description' => 'Junior High School'
        ]);

        // id = 6
        DB::table('grade_levels')->insert([
            'name' => 'Grade 12',
            'description' => 'Senior High School'
        ]);


        // fix subjects for grade 7
        DB::table('subjects')->insert([
            [
                'level' => '1',
                'title' => 'Filipino',
                'description' => 'Grade 7 - Filipino',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Araling Panlipunan',
                'description' => 'Grade 7 - Araling Panlipunan',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'English',
                'description' => 'Grade 7 - English',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Edukasyon sa Pagpapakatao',
                'description' => 'Grade 7 - Edukasyon sa Pagpapakatao',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Christian Living',
                'description' => 'Grade 7 - Christian Living',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Science',
                'description' => 'Grade 7 - Science',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Mathematics',
                'description' => 'Grade 7 - Mathematics',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Music',
                'description' => 'Grade 7 - Music',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Arts',
                'description' => 'Grade 7 - Arts',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Physical Education',
                'description' => 'Grade 7 - Physical Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'Health',
                'description' => 'Grade 7 - Health',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'TLE',
                'description' => 'Grade 7 - Technology and Livelihood Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '1',
                'title' => 'ICT',
                'description' => 'Grade 7 - Information Communication Technology',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ]
        ]);



        // fix subjects for grade 8
        DB::table('subjects')->insert([
            [
                'level' => '2',
                'title' => 'Filipino',
                'description' => 'Grade 8 - Filipino',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Araling Panlipunan',
                'description' => 'Grade 8 - Araling Panlipunan',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'English',
                'description' => 'Grade 8 - English',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Edukasyon sa Pagpapakatao',
                'description' => 'Grade 8 - Edukasyon sa Pagpapakatao',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Christian Living',
                'description' => 'Grade 8 - Christian Living',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Science',
                'description' => 'Grade 8 - Science',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Mathematics',
                'description' => 'Grade 8 - Mathematics',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Music',
                'description' => 'Grade 8 - Music',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '21',
                'title' => 'Arts',
                'description' => 'Grade 8 - Arts',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Physical Education',
                'description' => 'Grade 8 - Physical Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'Health',
                'description' => 'Grade 8 - Health',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'TLE',
                'description' => 'Grade 8 - Technology and Livelihood Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '2',
                'title' => 'ICT',
                'description' => 'Grade 8 - Information Communication Technology',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ]
        ]);




        // subject for grade 9
        DB::table('subjects')->insert([
            [
                'level' => '3',
                'title' => 'Filipino',
                'description' => 'Grade 9 - Filipino',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Araling Panlipunan',
                'description' => 'Grade 9 - Araling Panlipunan',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'English',
                'description' => 'Grade 9 - English',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Edukasyon sa Pagpapakatao',
                'description' => 'Grade 9 - Edukasyon sa Pagpapakatao',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Christian Living',
                'description' => 'Grade 9 - Christian Living',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Science',
                'description' => 'Grade 9 - Science',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Mathematics',
                'description' => 'Grade 9 - Mathematics',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Music',
                'description' => 'Grade 9 - Music',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Arts',
                'description' => 'Grade 9 - Arts',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Physical Education',
                'description' => 'Grade 9 - Physical Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'Health',
                'description' => 'Grade 9 - Health',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'TLE',
                'description' => 'Grade 9 - Technology and Livelihood Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '3',
                'title' => 'ICT',
                'description' => 'Grade 9 - Information Communication Technology',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ]
        ]);




        // subject for grade 10
        DB::table('subjects')->insert([
            [
                'level' => '4',
                'title' => 'Filipino',
                'description' => 'Grade 10 - Filipino',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Araling Panlipunan',
                'description' => 'Grade 10 - Araling Panlipunan',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'English',
                'description' => 'Grade 10 - English',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Edukasyon sa Pagpapakatao',
                'description' => 'Grade 10 - Edukasyon sa Pagpapakatao',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Christian Living',
                'description' => 'Grade 10 - Christian Living',
                'performance_task' => 50,
                'written_work' => 30,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Science',
                'description' => 'Grade 10 - Science',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Mathematics',
                'description' => 'Grade 10 - Mathematics',
                'performance_task' => 40,
                'written_work' => 40,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Music',
                'description' => 'Grade 10 - Music',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Arts',
                'description' => 'Grade 10 - Arts',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Physical Education',
                'description' => 'Grade 10 - Physical Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'Health',
                'description' => 'Grade 10 - Health',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'TLE',
                'description' => 'Grade 10 - Technology and Livelihood Education',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ],
            [
                'level' => '4',
                'title' => 'ICT',
                'description' => 'Grade 10 - Information Communication Technology',
                'performance_task' => 60,
                'written_work' => 20,
                'exam' => 20
            ]
        ]);


        DB::table('quarters')->insert([
            [
                'name' => 'first'
            ],
            [
                'name' => 'second'
            ],
            [
                'name' => 'third'
            ],
            [
                'name' => 'fourth'
            ]
        ]);

        DB::table('semesters')->insert([
            [
                'name' => 'first'
            ],
            [
                'name' => 'second'
            ]
        ]);

        

    }
}
