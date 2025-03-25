<?php

namespace Database\Seeders;

use App\Models\Cluster;
use App\Models\Course;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        DB::table('cluster_unit')->truncate();
        Cluster::truncate();

        $clusters = [
            [
                'Code' => 'ADVPROG',
                'Title' => 'Advanced Programming',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTPRG535', 'ICTPRG547']
            ],
            [
                'Code' => 'INTERIOT',
                'Title' => 'Intermediate IoT',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTPRG537', 'ICTIOT502', 'ICTIOT503']
            ],
            [
                'Code' => 'INTROPROG',
                'Title' => 'Introduction to Programming',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTPRG302']
            ],
            [
                'Code' => 'IP4RIoT',
                'Title' => 'Introduction to Programming for IoT',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTPRG430', 'ICTICT449']
            ],
            [
                'Code' => 'IPOS',
                'Title' => 'Intermediate Programming and Open Source',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTPRG429', 'ICTPRG443', 'ICTPRG439']
            ],
            [
                'Code' => 'MOBDEV',
                'Title' => 'Introduction to Mobile Development',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => []
            ],
            [
                'Code' => 'SAAS-FED',
                'Title' => 'Software as a Service - Front End Development',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTDBS507', 'ICTPRG556']
            ],
            [
                'Code' => 'ADVMOB',
                'Title' => 'Advanced Mobile Development',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTPRG603', 'ICTPRG549']
            ],
            [
                'Code' => 'SAAS-BED',
                'Title' => 'Software as a Service - Back End Development',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTPRG553', 'ICTPRG554']
            ],
            [
                'Code' => 'CYBAWD',
                'Title' => 'Cyber Awareness',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['BSBXCS402']
            ],
            [
                'Code' => 'BIGDAT',
                'Title' => 'Big Data',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTDAT503', 'ICTDAT501', 'BSBDAT501', 'ICTDAT503']
            ],
            [
                'Code' => 'INNOPRJ1',
                'Title' => 'Innovation Project (Part 1)',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['BSBCRT512', 'ICTICT517']
            ],
            [
                'Code' => 'INNOPRJ2',
                'Title' => 'Innovation Project (Part 2)',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['BSBXTW401', 'ICTSAS527']
            ],
            [
                'Code' => 'IPETHPD',
                'Title' => 'IP, Ethics & Privacy',
                'Qualification' => 'ICT50220',
                'StateCode' => 'AC21',
                'Units' => ['ICTICT532']
            ],
            [
                'Code' => 'PROGC',
                'Title' => 'Programming in another language (C#)',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTPRG440', 'ICTPRG433']
            ],
            [
                'Code' => 'CYBSECR',
                'Title' => 'Cyber Security Risk Management',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['BSBXCS404']
            ],
            [
                'Code' => 'ICTPROB',
                'Title' => 'IT Support (Software)',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTSAS432']
            ],
            [
                'Code' => 'COMPIP',
                'Title' => 'Comply with IP, ethics and privacy policies in ICT environments',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTICT451']
            ],
            [
                'Code' => 'INNOPRO0',
                'Title' => 'Innovation Project',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['BSBCRT404', 'ICTICT443', 'ICTICT426']
            ],
            [
                'Code' => 'APPYTHON',
                'Title' => 'Applied Python Programming',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTPRG429', 'ICTPRG443', 'ICTPRG439']
            ],
            [
                'Code' => 'MOBDEV',
                'Title' => 'Mobile Development (C#/Xamarin)',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTPRG437', 'ICTPRG436']
            ],
            [
                'Code' => 'WEBTECHP',
                'Title' => 'Web Technologies (HTML, CSS and JS)',
                'Qualification' => 'ICT40120',
                'StateCode' => 'AC07',
                'Units' => ['ICTWEB441', 'ICTWEB452']
            ],
        ];

        foreach ($clusters as $clusterData) {
            // Skip invalid entries
            if (empty($clusterData['Code'])) continue;

            $cluster = Cluster::create([
                'code' => $clusterData['Code'],
                'title' => $clusterData['Title'],
                'qualification' => $clusterData['Qualification'],
                'state_code' => $clusterData['StateCode'],
                'course_id' => $this->getCourseId($clusterData['Qualification'])
            ]);

            // Attach units after removing duplicates
            $unitIds = [];
            foreach ($clusterData['Units'] as $unitCode) {
                if ($unit = Unit::where('national_code', trim($unitCode))->first()) {
                    $unitIds[] = $unit->id;
                }
            }
            $cluster->units()->attach(array_unique($unitIds));
        }
    }

    private function getCourseId($qualification)
    {
        $course = Course::where('national_code', $qualification)->first();

        if (!$course) {
            $this->command->error("Course not found for qualification: {$qualification}");
            return null;
        }

        return $course->id;
    }
}
