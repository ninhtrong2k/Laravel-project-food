<?php

namespace Modules\Product\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Product\Src\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sử dụng Faker để tạo dữ liệu giả mạo
        $faker = \Faker\Factory::create();

        // Fake 5 sản phẩm
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => $faker->sentence(1), // Tạo tên ngẫu nhiên có 3 từ
                'slug' => $faker->slug(), // Tạo slug từ tên sản phẩm
                'category_id' => $faker->numberBetween(1, 5), // ID danh mục ngẫu nhiên từ 1 đến 5
                'image' => '/storage/photos/' . $faker->image('public/storage/photos', 400, 300, null, false), // Tạo đường dẫn hình ảnh ngẫu nhiên
                'view' => $faker->numberBetween(100, 1000), // Số lượt xem ngẫu nhiên từ 100 đến 1000
                'quantity' => $faker->numberBetween(10, 100), // Số lượng ngẫu nhiên từ 10 đến 100
                'price' => $faker->numberBetween(10000, 1000000), // Giá ngẫu nhiên từ 10,000 đến 1,000,000
                'detail' => $faker->paragraph(), // Tạo chi tiết ngẫu nhiên
                'description' => $faker->paragraph(), // Tạo mô tả ngẫu nhiên
                'status' => $faker->boolean(), // Trạng thái ngẫu nhiên true hoặc false
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Thời gian tạo ngẫu nhiên trong vòng 1 năm trở lại đây
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'), // Thời gian cập nhật ngẫu nhiên trong vòng 1 năm trở lại đây
            ]);
        }
    }
}
