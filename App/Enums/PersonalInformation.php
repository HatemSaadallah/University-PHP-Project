<?php

// Create enum personal information
namespace App\Enums;



    class PersonalInformation {
        const name = "full_name";
        const gender = "gender";
        const birth_date = "birth_date";
        const nationality = "nationality";
        const place_of_birth = "place_of_birth";
        const job_title = "job_title";
        const years_of_experience ="years_of_experience";
        const personalImageUrl = "personal_image_url";

        public static function getConstants() {
            // Return array
            return array(
                'Full Name: ' => PersonalInformation::name,
                'Gender: ' => PersonalInformation::gender,
                'Birth Date:' => PersonalInformation::birth_date,
                'Nationality:' => PersonalInformation::nationality,
                'Place of Birth:' => PersonalInformation::place_of_birth,
                'Job Title:' => PersonalInformation::job_title,
                'Years of Experience:' => PersonalInformation::years_of_experience,
            );
        }
    }
?>