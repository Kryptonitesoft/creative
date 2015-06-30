<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FileEntriesTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        DB::table('fileentries')->delete();
        $fileentries = array(
            [
                'id'         => 1,
                'link'       => "fileStorage/images/img (1).jpg",
                'type'       => "image",
                'title'      => "Need for Speed - Rivals",
                'size'       => 74530,
                'description'=> 'This is one the best racing game.',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 2,
                'link'       => "fileStorage/documents/Computer Programming by Tamim Shahriar Subeen.docx",
                'type'       => "document",
                'title'      => "Computer Programming",
                'size'       => 463147,
                'description'=> 'Computer Programming by Tamim Shahriar Subeen is the best bangla programming book.',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 3,
                'link'       => "fileStorage/presentations/CSEC 229 - Lecture 01.pptx",
                'type'       => "presentation",
                'title'      => "Computer Architecture Lecture 1",
                'size'       => 329840,
                'description'=> 'Computer Architecture Lecture 1 by Arif Tanvir',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 4,
                'link'       => "fileStorage/ebooks/AngularJS.pdf",
                'type'       => "ebook",
                'title'      => "AngularJS",
                'size'       => 8784260,
                'description'=> 'AngularJS is the best front-end framework.',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 5,
                'link'       => "SjeWHbsAMlU",
                'type'       => "video",
                'title'      => "Google Material Design",
                'size'       => 0,
                'description'=> 'A tutorial on Google Material Design',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 6,
                'link'       => "fileStorage/images/img (2).jpg",
                'type'       => "image",
                'title'      => "Red Ferrari",
                'size'       => 75649,
                'description'=> 'This is a nice car.',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 7,
                'link'       => "fileStorage/documents/Hakush Pakush.docx",
                'type'       => "document",
                'title'      => "Hakush Pakush",
                'size'       => 324133,
                'description'=> 'A nice book on python programming language',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 8,
                'link'       => "fileStorage/presentations/CSEC 229 - Lecture 02.pptx",
                'type'       => "presentation",
                'title'      => "Computer Architecture Lecture 2",
                'size'       => 217134,
                'description'=> 'Computer Architecture Lecture 1 by Arif Tanvir',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 9,
                'link'       => "fileStorage/ebooks/Mastering jQuery.pdf",
                'type'       => "ebook",
                'title'      => "Mastering jQuery",
                'size'       => 1491879,
                'description'=> 'A nice book on jQuery',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 10,
                'link'       => "H6BKYEJftik",
                'type'       => "video",
                'title'      => "Dorpohoron",
                'size'       => 0,
                'description'=> 'A nice bangla drama.',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 11,
                'link'       => "fileStorage/images/img (3).jpg",
                'type'       => "image",
                'title'      => "Pagani Zondai",
                'size'       => 61896,
                'description'=> 'Pagani Zondai is a awesome car.',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 12,
                'link'       => "fileStorage/documents/Java Programming.docx",
                'type'       => "document",
                'title'      => "Java Programming",
                'size'       => 1880188,
                'description'=> 'A note on Java Programming',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 13,
                'link'       => "fileStorage/presentations/CSEC 229 - Lecture 03.pptx",
                'type'       => "presentation",
                'title'      => "Computer Architecture Lecture 3",
                'size'       => 217793,
                'description'=> 'Computer Architecture Lecture 1 by Arif Tanvir',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 14,
                'link'       => "fileStorage/ebooks/ng-book.pdf",
                'type'       => "ebook",
                'title'      => "ng-book",
                'size'       => 24735818,
                'description'=> 'ng-book - The Complete Book on AngularJS',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                'id'         => 15,
                'link'       => "JMiVuD6c1_w",
                'type'       => "video",
                'title'      => "PentaLoon",
                'size'       => 0,
                'description'=> 'How to PentaLoon Attack in Clash of Clans',
                'isVisible'  => 1,
                'views'      => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]
        );


        DB::table('fileentries')->insert($fileentries);
    }

}