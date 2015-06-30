<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TeachersTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('teachers')->delete();
 
        $teachers = array(
            [
                'id'          => 1,
                'name'        => 'Md. Sazzad Hossain (Mahin)',
                'designation' => 'Founder & Director',
                'teaches'     => 'Biology',
                'education'   => 'B.Sc (Hons), M.Sc in Botany, National University B.Ed, National University M.Ed, Dhaka University',
                'description' => 'lorem',
                'image'       => 'fileStorage/persons/Mohammad Sazzad Hossain (Mahin).jpg',
                'email'       => 'sazzadmahin1979@gmail.com',
                'fb'          => 'http://fb.me/sazzadhossain1979',
                'phone'       => '1731587382',
                'created_at'  => new DateTime,
                'updated_at'  => new DateTime
            ],
            ['id' => 2, 'name' => 'Md. Suzaud Doula'      , 'designation' => 'Teacher'              , 'teaches' => 'Bangla'                 , 'education' => 'B.A (Hons), M.A, M.Phil in Bangla, DU'    , 'description' => '', 'image' => 'img/male.jpg'                                  , 'email' => 'unknown1@gmail.com'     , 'fb' => 'http://fb.me/something1'                    , 'phone' => '1', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Md. Anowarul Islam'    , 'designation' => 'Teacher'              , 'teaches' => 'Mathematics'            , 'education' => 'B.Sc (Hons), M.Sc in Mathematics, NU'     , 'description' => '', 'image' => 'img/male.jpg'                                  , 'email' => 'unknown3@gmail.com'     , 'fb' => 'http://fb.me/something3'                    , 'phone' => '3', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Md. Yahia'             , 'designation' => 'Exam Controller'      , 'teaches' => 'English'                , 'education' => 'B.A (Hons), M.A in English, NU, M.B.A, DU', 'description' => '', 'image' => 'fileStorage/persons/Md. Yahia.jpg'             , 'email' => 'unknown4@gmail.com'     , 'fb' => 'http://fb.me/profile.php?id=100008167577894', 'phone' => '4', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Md. Ruhul Amin'        , 'designation' => 'Teacher'              , 'teaches' => 'English'                , 'education' => 'B.A (Hons), M.A in English, NU'           , 'description' => '', 'image' => 'fileStorage/persons/Md. Ruhul Amin.jpg'        , 'email' => 'unknown5@gmail.com'     , 'fb' => 'http://fb.me/profile.php?id=100007576234636', 'phone' => '5', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'name' => 'Md. Delowar Hossain'   , 'designation' => 'Assistant Coordinator', 'teaches' => 'Physics & Mathematics'  , 'education' => 'B.Sc (Engg) in CSE, IUBAT'                , 'description' => '', 'image' => 'fileStorage/persons/Md. Delowar Hossain.jpg'   , 'email' => 'unknown6@gmail.com'     , 'fb' => 'http://fb.me/blacknwhiteadan'               , 'phone' => '1675738616', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'name' => 'Md. Halim Pathan Sohag', 'designation' => 'Teacher'              , 'teaches' => 'Mathematics'            , 'education' => 'B.Sc (Hons), M.Sc in Mathematics, NU'     , 'description' => '', 'image' => 'fileStorage/persons/Md. Halim Pathan Sohag.jpg', 'email' => 'unknown7@gmail.com'     , 'fb' => 'http://fb.me/pathansohag2014'               , 'phone' => '7', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'name' => 'Md. Din Islam Khan'    , 'designation' => 'Teacher'              , 'teaches' => 'Chemistry & Mathematics', 'education' => 'B.Sc in Textile Engineering, NUB'         , 'description' => '', 'image' => 'fileStorage/persons/Md. Din Islam Khan.jpg'    , 'email' => 'unknown8@gmail.com'     , 'fb' => 'http://fb.me/din.islam.779'                 , 'phone' => '8', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'name' => 'Md. Sabbir Rahman'     , 'designation' => 'Teacher'              , 'teaches' => 'ICT'                    , 'education' => 'B.Sc (Engg) in CSE, UU'                   , 'description' => '', 'image' => 'fileStorage/persons/Md. Sabbir Rahman.jpg'     , 'email' => 'sabbir.jassim@gmail.com', 'fb' => 'http://fb.me/blackheartadhar'               , 'phone' => '1677518969', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        
        DB::table('teachers')->insert($teachers);
    }

}