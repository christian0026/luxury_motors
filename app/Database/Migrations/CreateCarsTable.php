<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCarsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'make' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'model' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'year' => [
                'type' => 'INT',
                'constraint' => 4
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2'
            ],
            'mileage' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'transmission' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'body_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'engine' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'horsepower' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'torque' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'top_speed' => [
                'type' => 'INT',
                'constraint' => 4
            ],
            'acceleration' => [
                'type' => 'DECIMAL',
                'constraint' => '4,2'
            ],
            'fuel_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'doors' => [
                'type' => 'INT',
                'constraint' => 1
            ],
            'seats' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'featured' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
            'sold' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('cars');
        
        // Seed some initial data
        $this->seedInitialData();
    }
    
    public function down()
    {
        $this->forge->dropTable('cars');
    }
    
    protected function seedInitialData()
    {
        $data = [
            [
                'make' => 'Ferrari',
                'model' => 'SF90 Stradale',
                'year' => 2023,
                'price' => 625000.00,
                'mileage' => 500,
                'transmission' => 'Automatic',
                'body_type' => 'Coupe',
                'color' => 'Rosso Corsa',
                'engine' => '4.0L V8 Hybrid',
                'horsepower' => 986,
                'torque' => 590,
                'top_speed' => 211,
                'acceleration' => 2.5,
                'fuel_type' => 'Premium',
                'doors' => 2,
                'seats' => 2,
                'description' => 'The SF90 Stradale is Ferrari\'s first series production PHEV (Plug-in Hybrid Electric Vehicle). It boasts a combined power output of 986 hp from its twin-turbo V8 and three electric motors.',
                'featured' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'make' => 'Lamborghini',
                'model' => 'Aventador SVJ',
                'year' => 2022,
                'price' => 517000.00,
                'mileage' => 1200,
                'transmission' => 'Automatic',
                'body_type' => 'Coupe',
                'color' => 'Arancio Atlas',
                'engine' => '6.5L V12',
                'horsepower' => 759,
                'torque' => 531,
                'top_speed' => 217,
                'acceleration' => 2.8,
                'fuel_type' => 'Premium',
                'doors' => 2,
                'seats' => 2,
                'description' => 'The Aventador SVJ represents the pinnacle of Lamborghini\'s V12 heritage, featuring the most advanced aerodynamics and the most powerful V12 engine ever fitted to a Lamborghini.',
                'featured' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'make' => 'McLaren',
                'model' => '720S',
                'year' => 2021,
                'price' => 315000.00,
                'mileage' => 3500,
                'transmission' => 'Automatic',
                'body_type' => 'Coupe',
                'color' => 'Sicilian Yellow',
                'engine' => '4.0L V8',
                'horsepower' => 710,
                'torque' => 568,
                'top_speed' => 212,
                'acceleration' => 2.8,
                'fuel_type' => 'Premium',
                'doors' => 2,
                'seats' => 2,
                'description' => 'The McLaren 720S is a masterpiece of engineering, featuring a carbon fiber chassis, dihedral doors, and a twin-turbo V8 that delivers breathtaking performance.',
                'featured' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];
        
        $this->db->table('cars')->insertBatch($data);
    }
}

