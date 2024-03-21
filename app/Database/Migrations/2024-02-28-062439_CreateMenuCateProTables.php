<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuCateProTables extends Migration
{
    public function up()
    {
         /* CREATE TABLE MENU */
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'meta' => [
                'type'       => 'TEXT',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu');
        
        /* CREATE TABLE CATEGORIES */
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'parent' => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'meta' => [
                'type'       => 'TEXT',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('parent', 'menu', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('category');

        /* CREATE TALBE PRODUCTS */
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'parent' => [
                'type'       => 'INT',
                'unsigned'       => true,
                'constraint' => 11,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0', // 10 digits in total, 2 after the decimal point
            ],
            'sale' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'detail' => [
                'type'       => 'TEXT',
            ],
            'view' => [
                'type'       => 'INT',
                'constraint' => 25,
            ],
            'total' => [
                'type'       => 'INT',
                'constraint' => 25,
            ],
            'sold' => [
                'type'       => 'INT',
                'constraint' => 25,
            ],
            'time' => [
                'type'       => 'DATETIME',
            ],
            'meta' => [
                'type'       => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('parent', 'category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
        

    }

    public function down()
    {
        $this->forge->dropTable('menu');
        $this->forge->dropTable('category');
        $this->forge->dropTable('products');
    }
}
