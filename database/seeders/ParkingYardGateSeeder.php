<?php

namespace Database\Seeders;

use App\Models\ParkingYardGate\Parking_Yard_Gate;
use Illuminate\Database\Seeder;

class ParkingYardGateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*this is implemented only for tripsheet creation table logic
         remove once if flow is corrected
         */
        //Hire vehicle flow after document verification
        Parking_Yard_Gate::create([
            "vehicle_type_id" => 3,
            "vehicle_id" => rand(1, 50),
            "vehicle_number" => "TN87AT4512",
            "vehicle_capacity_id" => 2,
            "driver_name" => "Hire Driver Name",
            "driver_contact_number" => "9687451225",
            "vehicle_body_type_id" => 2,
            "vehicle_inspection_id" => 1,
            "parking_status" => "1",
            "maintenance_status" => null,
            "trip_sto_status" => null,
            "vendor_creation_status" => "1",
            "vehicle_inspection_status" => "1",
            "document_verification_status" => "0",
            "gate_in_date_time" => now(),
            "gate_out_date_time" => now(),
        ]);

        //Own & Contract vehicle flow after document verification
        Parking_Yard_Gate::create([
            "vehicle_type_id" => 1,
            "vehicle_id" => 23,
            "driver_id" => 2,
            "odometer_km" => "58200",
            "odometer_photo" => "dummy photo",
            "vehicle_number" => "TN36NA1724",
            "vehicle_capacity_id" => 4,
            "driver_name" => "shane",
            "driver_contact_number" => "9785622145",
            "vehicle_body_type_id" => 1,
            "vehicle_inspection_id" => 6,
            "parking_status" => "1",
            "maintenance_status" => null,
            "trip_sto_status" => null,
            "vendor_creation_status" => null,
            "vehicle_inspection_status" => "1",
            "document_verification_status" => "1",
            "gate_in_date_time" => now(),
            "gate_out_date_time" => now(),
        ]);


        Parking_Yard_Gate::factory()->count(10)->create();
    }
}
