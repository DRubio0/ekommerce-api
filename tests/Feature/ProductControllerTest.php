<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Subcategories;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function testIndex()
    {
        $response = $this->get(route('product.index'));

        $response->assertStatus(302);
        $response = $this->followRedirects($response);
        $response->assertStatus(200);
    }
}
