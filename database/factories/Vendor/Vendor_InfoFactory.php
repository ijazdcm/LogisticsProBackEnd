<?php

namespace Database\Factories\Vendor;

use App\Models\Vendor\Vendor_Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Vendor_InfoFactory extends Factory
{

    protected $model = Vendor_Info::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "shed_id"=>rand(1,50),
            "owner_name"=>$this->faker->firstName($gender = 'male'),
            "pan_card_number"=>"ABCTY".rand(1000,9999)."D",
            "pan_card_attachment"=>"PanAttactment".rand(1,50).".jpeg",
            "aadhar_card_number"=>$this->faker->unique()->numberBetween($min = 100000000000, $max = 1000000000000),
            "aadhar_card_copy"=>"AadharAttactment".rand(1,50).".jpeg",
            "license_copy"=>"VLNCPY".rand(1,50).".jpeg",
            "rc_copy_front"=>"V_RC_CPY_FRT".rand(1,50).".jpeg",
            "rc_copy_back"=>"V_RC_CPY_BCK".rand(1,50).".jpeg",
            "insurance_copy"=>"V_INSU_CPY".rand(1,50).".jpeg",
            "transpoter_shed_sheet"=>"V_TRSHED_SHT".rand(1,50).".jpeg",
            "bank_pass_book_copy"=>"V_BK_PASSBOOK".rand(1,50).".jpeg",
            "bank_name"=>$this->faker->randomElement($array=["KVB","AXIS","SBI","IOB","TMB","IB","CUB","PNB"]),
            "bank_branch"=>$this->faker->randomElement($array=["TRICHY","MADURAI","CHEENAI","KARUR","DINDUGAL","PONDY","THANJORE","PERAMBALUR"]),
            "bank_ifsc_Code"=>$this->faker->randomElement($array=["KVB","AXIS","SBI","IOB","TMB","IB","CUB","PNB"]).$this->faker->unique()->numberBetween($min = 99999, $max = 999999),
            "bank_acc_number"=>$this->faker->unique()->numberBetween($min = 99999999, $max = 999999999),
            "bank_acc_holder_name"=>$this->faker->firstName($gender = 'male'),
            "street"=>$this->faker->randomElement($array=["VALUVAR STREET","GANDHI STREET","KALKI STREET","KAMARAJAR STREET","TEST STREET","KAVAERY STREET"]),
            "area"=>$this->faker->randomElement($array=["VALUVAR NAGAR","GANDHI NAGAR","KALKI NAGAR","KAMARAJAR NAGAR","TEST NAGAR","KAVAERY NAGAR"]),
            "city"=>$this->faker->randomElement($array=["TRICHY","MADURAI","CHEENAI","KARUR","DINDUGAL","PONDY","THANJORE","PERAMBALUR"]),
            "district"=>$this->faker->randomElement($array=["TRICHY","MADURAI","CHEENAI","KARUR","DINDUGAL","PONDY","THANJORE","PERAMBALUR"]),
            "state"=>$this->faker->randomElement($array=["TAMIL NADU","ANDHAR PRADESH","KARNATAKA","KERELA","PUNJAB","MAHARASTRA","THELUNGANA","BIHAR"]),
            "postal_code"=>$this->faker->unique()->numberBetween($min = 99999, $max = 999999),
            "region"=>$this->faker->randomElement($array=["LN","KN","HX","JG","VH","ZX"]),
            "tds_decelration_form_front"=>"V_TDS_DEC_FRT".rand(1,50).".jpeg",
            "tds_decelration_form_back"=>"V_TDS_DEC_BCK".rand(1,50).".jpeg",
            "gts_registration"=>"V_TDS_DEC_BCK".rand(1,50).".jpeg",
            "gts_registration_number"=>"GTS".$this->faker->unique()->numberBetween($min = 99999, $max = 999999),
            "gst_tax_code"=>"GTS".$this->faker->unique()->numberBetween($min = 99999, $max = 999999),
            "payment_term_3days"=>$this->faker->time,
            "remarks"=>$this->faker->text,
        ];
    }
}
