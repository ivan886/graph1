<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
class GraphTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testConsultaSite()
    {
        $response = $this->graphQL('
        {
            site(
                id:112
            ) 
            { id
              name
            }  
          }
        ');
        
        $name = $response->json("data.*.name")[0];
        $this->assertEquals($name, "Espinal");

    }

    public function testArchivo(){
        
        $this->multipartGraphQL(
            [
                'operations' => /* @lang JSON */
                    '
                    {
                        "query": "mutation upload($file: Upload!) { upload(file: $file) }",
                        "variables": {
                            "file": null
                        }
                    }
                ',
                'map' => /* @lang JSON */
                    '
                    {
                        "0": ["variables.file"]
                    }
                ',
            ],
            [
                '0' => UploadedFile::fake()->create('image.jpg', 500),
            ]
            );

          //  var_dump( UploadedFile::fake()->create('image.jpg', 500));
    }

    public function testEncrypt(){
        $hashed = Hash::make('graphql', [ 
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);
        $encrypted = Crypt::encryptString( '154165465132131654560'.'_'.$hashed );
//        print_r($encrypted);
           $decrypted = Crypt::decryptString($encrypted);
  //      print_r($decrypted);
    }
    
}
