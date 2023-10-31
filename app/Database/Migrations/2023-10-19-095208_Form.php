<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEventRequestTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'firstName' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'middleName' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'lastName' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'companyName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'phoneNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'alternativePhoneNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'passportNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'nidaNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'nationalityType' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'areaOfInterest' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'physicalAddress' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'typeOfBusiness' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'sector' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'registrationBody' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'approved' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
                'null' => true,
            ],
            'createdAt' => [
                'type' => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
                'null' => true,
            ],
            'updatedAt' => [
                'type' => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('registration');
    }

    public function down()
    {
        $this->forge->dropTable('registration');
    }
}
