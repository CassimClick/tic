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
            ],
            'nidaId' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'nationalityType' => [
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
            'createdAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updatedAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('event_request');
    }

    public function down()
    {
        $this->forge->dropTable('event_request');
    }
}
