<?php

// Create enum personal information
namespace App\Enums;



    class PersonalInformation {
        const name = "Hatem Raafat Saadallah";
        const gender = "Male";
        const birth_date = "1 July 2000";
        const nationality = "Palestinian";
        const place_of_birth = "Gaza";
        const job_title = "Software Engineer";
        const years_of_experience ="3 years";
        const personalImageUrl = "https://via.placeholder.com/300x300";

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