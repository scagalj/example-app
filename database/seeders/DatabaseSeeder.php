<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Accessories;
use App\Models\ApartmentReviews;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        $apartmentReviews = [
            [
                'firstName' => 'Petar',
                'title' => 'Original beauty',
                'positiveComment' => 'Comfort, cleanliness, friendly staff.',
                'negativeComment' => '',
                'ratingNumber' => 10,
                'countryCode' => 'HRV',
                'bookingStartDate' => Carbon::parse('2021-10-05 00:00:00'),
                'bookingEndDate' => Carbon::parse('2021-10-06 00:00:00'),
                'reviewDate' => Carbon::parse('2021-11-02 00:00:00'),
                'numberOfGuests' => 1,
            ],
            [
                'firstName' => 'Jamie',
                'title' => 'Exceptional',
                'positiveComment' => 'Lovely and helpful staff, decent location, great aircon and good value. For the money, one of the best I have used in Croatia. Highly recommended.',
                'negativeComment' => '',
                'ratingNumber' => '10',
                'countryCode' => 'NOR',
                'bookingStartDate' => Carbon::parse('2022-08-02 00:00:00'),
                'bookingEndDate' => Carbon::parse('2022-08-03 00:00:00'),
                'reviewDate' => Carbon::parse('2022-08-25 00:00:00'),
                'numberOfGuests' => '2',
            ],
            [
                'firstName' => 'Megaloman',
                'title' => 'It was nice!',
                'positiveComment' => 'We liked the location of the apartment and the very clean room! The apartment is located in the very nice part of Omiš! It is near the center but at the same time very well protected from the noise!',
                'negativeComment' => '',
                'ratingNumber' => '10',
                'countryCode' => 'SLO',
                'bookingStartDate' => Carbon::parse('2021-08-01 00:00:00'),
                'bookingEndDate' => Carbon::parse('2021-08-02 00:00:00'),
                'reviewDate' => Carbon::parse('2021-08-20 00:00:00'),
                'numberOfGuests' => '2',
            ],
            [
                'firstName' => 'Zeljka',
                'title' => 'Exceptional',
                'positiveComment' => 'The location was perfect and quiet but really close to the old town. The hosts were very welcoming, friendly and helpful.',
                'negativeComment' => '',
                'ratingNumber' => '9',
                'countryCode' => 'NLD',
                'bookingStartDate' => Carbon::parse('2021-08-08 00:00:00'),
                'bookingEndDate' => Carbon::parse('2021-08-14 00:00:00'),
                'reviewDate' => Carbon::parse('2021-08-29 00:00:00'),
                'numberOfGuests' => '3',
            ],
            [
                'firstName' => 'Vit',
                'title' => 'Exceptional',
                'positiveComment' => 'Great accommodation in a quiet part of town - however everything is still in a walking distance. Very nice and helpful host. Great value for money. I wouldn\'t hesitate to stay here next time.',
                'negativeComment' => '',
                'ratingNumber' => '10',
                'countryCode' => 'CZE',
                'bookingStartDate' => Carbon::parse('2021-07-04 00:00:00'),
                'bookingEndDate' => Carbon::parse('2021-07-06 00:00:00'),
                'reviewDate' => Carbon::parse('2021-07-13 00:00:00'),
                'numberOfGuests' => '2',
            ],
            [
                'firstName' => 'Tea',
                'title' => 'Exceptional',
                'positiveComment' => 'Beautiful cute little apartment that has everything you need and the most spectacular view, the glorious Dinara mountains. The apartment was super clean and the landlady was extremely nice and helpful. I would highly recommend this place to everyone',
                'negativeComment' => '',
                'ratingNumber' => '10',
                'countryCode' => 'HRV',
                'bookingStartDate' => Carbon::parse('2021-06-15 00:00:00'),
                'bookingEndDate' => Carbon::parse('2021-06-17 00:00:00'),
                'reviewDate' => Carbon::parse('2021-06-24 00:00:00'),
                'numberOfGuests' => '1',
            ],
            [
                'firstName' => 'Stanisław',
                'title' => 'This is my first adventure with Omis and this apartment. I will definitely come back here.',
                'positiveComment' => 'Great location. Peace and quiet, despite the fact that a few hundred meters away, the holiday life of Omisia is vibrant. Very nice and hospitable hosts. Welcome pack food and fruit.',
                'negativeComment' => '',
                'ratingNumber' => '10',
                'countryCode' => 'POL',
                'bookingStartDate' => Carbon::parse('2022-07-18 00:00:00'),
                'bookingEndDate' => Carbon::parse('2022-07-28 00:00:00'),
                'reviewDate' => Carbon::parse('2021-08-04 00:00:00'),
                'numberOfGuests' => '3',
            ],
            [
                'firstName' => 'Irunu',
                'title' => 'Quality at a very good price.',
                'positiveComment' => 'The calm of the studio while it is very close to the city center.',
                'negativeComment' => '',
                'ratingNumber' => '10',
                'countryCode' => 'FRA',
                'bookingStartDate' => Carbon::parse('2020-08-18 00:00:00'),
                'bookingEndDate' => Carbon::parse('2020-08-20 00:00:00'),
                'reviewDate' => Carbon::parse('2020-08-15 00:00:00'),
                'numberOfGuests' => '2',
            ],
            
        ];
        $requestAccessories = [
            [
                'name' => 'Stand up paddle',
                'description' => '',
                'accessoriesType' => 'outdoors',
                'request' => 1,
                'iconPath' => '',
            ],
            [
                'name' => 'Cleaning available during stay',
                'description' => '',
                'accessoriesType' => 'services',
                'request' => 1,
                'iconPath' => '',
            ],
        ];

        $popularAccessories = [
            [
                'name' => 'Free parking on premises',
                'description' => '',
                'accessoriesType' => 'parking',
                'popular' => 1,
                'iconPath' => 'M26 19a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 18a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm20.693-5l.42 1.119C29.253 15.036 30 16.426 30 18v9c0 1.103-.897 2-2 2h-2c-1.103 0-2-.897-2-2v-2H8v2c0 1.103-.897 2-2 2H4c-1.103 0-2-.897-2-2v-9c0-1.575.746-2.965 1.888-3.882L4.308 13H2v-2h3v.152l1.82-4.854A2.009 2.009 0 0 1 8.693 5h14.614c.829 0 1.58.521 1.873 1.297L27 11.151V11h3v2h-2.307zM6 25H4v2h2v-2zm22 0h-2v2h2v-2zm0-2v-5c0-1.654-1.346-3-3-3H7c-1.654 0-3 1.346-3 3v5h24zm-3-10h.557l-2.25-6H8.693l-2.25 6H25zm-15 7h12v-2H10v2z',
            ],
            [
                'name' => 'Wifi',
                'description' => 'Available in the facility',
                'accessoriesType' => 'internet',
                'popular' => 1,
                'iconPath' => 'm15.9999 20.33323c2.0250459 0 3.66667 1.6416241 3.66667 3.66667s-1.6416241 3.66667-3.66667 3.66667-3.66667-1.6416241-3.66667-3.66667 1.6416241-3.66667 3.66667-3.66667zm0 2c-.9204764 0-1.66667.7461936-1.66667 1.66667s.7461936 1.66667 1.66667 1.66667 1.66667-.7461936 1.66667-1.66667-.7461936-1.66667-1.66667-1.66667zm.0001-7.33323c3.5168171 0 6.5625093 2.0171251 8.0432368 4.9575354l-1.5143264 1.5127043c-1.0142061-2.615688-3.5549814-4.4702397-6.5289104-4.4702397s-5.5147043 1.8545517-6.52891042 4.4702397l-1.51382132-1.5137072c1.48091492-2.939866 4.52631444-4.9565325 8.04273174-4.9565325zm.0001-5.3332c4.9804693 0 9.3676401 2.540213 11.9365919 6.3957185l-1.4470949 1.4473863c-2.1746764-3.5072732-6.0593053-5.8431048-10.489497-5.8431048s-8.31482064 2.3358316-10.48949703 5.8431048l-1.44709488-1.4473863c2.56895177-3.8555055 6.95612261-6.3957185 11.93659191-6.3957185zm-.0002-5.3336c6.4510616 0 12.1766693 3.10603731 15.7629187 7.9042075l-1.4304978 1.4309874c-3.2086497-4.44342277-8.4328305-7.3351949-14.3324209-7.3351949-5.8991465 0-11.12298511 2.89133703-14.33169668 7.334192l-1.43047422-1.4309849c3.58629751-4.79760153 9.31155768-7.9032071 15.7621709-7.9032071z',
            ],
            [
                'name' => 'Essentials',
                'description' => 'Towels, bed sheets, soap, toilet paper, pillows',
                'accessoriesType' => 'bedroom',
                'popular' => 1,
                'iconPath' => 'M11 1v7l1.898 20.819.007.174c-.025 1.069-.804 1.907-1.818 1.999a2 2 0 0 1-.181.008h-7.81l-.174-.008C1.86 30.87 1.096 30.018 1.096 29l.002-.09 1.907-21L3.001 1zm6 0l.15.005a2 2 0 0 1 1.844 1.838L19 3v7.123l-2 8V31h-2V18.123l.007-.163.02-.162.033-.16L16.719 11H13V1zm11 0a2 2 0 0 1 1.995 1.85L30 3v26a2 2 0 0 1-1.85 1.995L28 31h-7v-2h7v-2h-7v-2h7v-2h-7v-2h7v-2h-7v-2h7v-2h-7v-2h7v-2h-7V9h7V7h-7V5h7V3h-7V1zM9.088 9h-4.18L3.096 29l.058.002L10.906 29l-.004-.058zM17 3h-2v6h2zM9.002 3H5L5 7h4.004z',
            ],
            [
                'name' => 'Air conditioning',
                'description' => 'Free of charge',
                'accessoriesType' => 'heating_and_cooling',
                'popular' => 1,
                'iconPath' => 'M17 1v4.03l4.026-2.324 1 1.732L17 7.339v6.928l6-3.464V5h2v4.648l3.49-2.014 1 1.732L26 11.381l4.026 2.325-1 1.732L24 12.535l-6 3.464 6 3.465 5.026-2.902 1 1.732L26 20.618l3.49 2.016-1 1.732L25 22.351V27h-2v-5.804l-6-3.465v6.929l5.026 2.902-1 1.732L17 26.97V31h-2v-4.031l-4.026 2.325-1-1.732L15 24.66v-6.929l-6 3.464V27H7v-4.65l-3.49 2.016-1-1.732 3.489-2.016-4.025-2.324 1-1.732 5.025 2.901 6-3.464-6-3.464-5.025 2.903-1-1.732L6 11.38 2.51 9.366l1-1.732L7 9.648V5h2v5.803l6 3.464V7.339L9.974 4.438l1-1.732L15 5.03V1z',
            ],
            [
                'name' => 'Cleaning products',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'popular' => 1,
                'iconPath' => 'm16 1c4.2577297 0 7.6061002 4.44290329 7.9676272 10.0003215l.9151078-.0003215c1.1045695 0 2 .8954305 2 2l-.0030605.1106008-.009172.1102623-1.7777778 16c-.1066174.9595566-.8806101 1.6977936-1.8282962 1.7728448l-.1594713.0062921h-14.20991441c-.96546167 0-1.78465665-.6877341-1.96390315-1.6213359l-.02386432-.157801-.46927532-4.2208631h-1.438c-1.0543618 0-1.91816512-.8158778-1.99451426-1.8507377l-.00548574-.1492623v-9c0-2.6887547 2.12230671-4.88181811 4.78311038-4.99538049l.21688962-.00461951.29801537.00075392c.94105005-4.62384838 4.00271273-8.00075392 7.70198463-8.00075392zm8.215 18h-7.216l.001 4c0 1.0543618-.8158778 1.9181651-1.8507377 1.9945143l-.1492623.0054857h-6.55l.44504279 4h14.20991441zm-9.215 2h-10v2h10zm0-10h-7c-1.59768088 0-2.90366088 1.24892-2.99490731 2.8237272l-.00509269.1762728v5h10zm9.882735 2h-7.882735l-.001 4h7.439zm-8.882735-10c-2.5155248 0-4.806568 2.43876571-5.6544537 6.00043764l4.6544537-.00043764c1.0543618 0 1.9181651.81587779 1.9945143 1.8507377l.0054857.1492623 4.9630093.0001755c-.3387204-4.54720908-2.9579088-8.0001755-5.9630093-8.0001755z',
            ],
            [
                'name' => 'Cooking basics',
                'description' => 'Pots and pans, oil, salt and pepper',
                'accessoriesType' => 'kitchen',
                'popular' => 1,
                'iconPath' => 'M26 1a5 5 0 0 1 5 5c0 6.389-1.592 13.187-4 14.693V31h-2V20.694c-2.364-1.478-3.942-8.062-3.998-14.349L21 6l.005-.217A5 5 0 0 1 26 1zm-9 0v18.118c2.317.557 4 3.01 4 5.882 0 3.27-2.183 6-5 6s-5-2.73-5-6c0-2.872 1.683-5.326 4-5.882V1zM2 1h1c4.47 0 6.934 6.365 6.999 18.505L10 21H3.999L4 31H2zm14 20c-1.602 0-3 1.748-3 4s1.398 4 3 4 3-1.748 3-4-1.398-4-3-4zM4 3.239V19h3.995l-.017-.964-.027-.949C7.673 9.157 6.235 4.623 4.224 3.364l-.12-.07zm19.005 2.585L23 6l.002.31c.045 4.321 1.031 9.133 1.999 11.39V3.17a3.002 3.002 0 0 0-1.996 2.654zm3.996-2.653v14.526C27.99 15.387 29 10.4 29 6a3.001 3.001 0 0 0-2-2.829z',
            ],
            [
                'name' => 'Dedicated workspace',
                'description' => 'Guests have a desk or table that’s used just for working, along with a comfortable chair.',
                'accessoriesType' => 'internet',
                'popular' => 1,
                'iconPath' => '',
            ],
            [
                'name' => 'Dishes and silverware',
                'description' => 'Bowls, chopsticks, plates, cups, etc.',
                'accessoriesType' => 'kitchen',
                'popular' => 1,
                'iconPath' => 'M29 1v2c-7.18 0-13 5.82-13 13 0 7.077 5.655 12.833 12.693 12.996L29 29v2c-8.284 0-15-6.716-15-15 0-8.18 6.547-14.83 14.686-14.997zM3 1h2v6h2V1h2v6h2V1h2v9a5.002 5.002 0 0 1-3.999 4.9L9 31H7V14.9a5.01 5.01 0 0 1-3.978-4.444l-.017-.232L3 10zm26 6v2a7 7 0 0 0-.24 13.996L29 23v2a9 9 0 0 1-.265-17.996zM10.999 9h-6v.975l.005.176a3 3 0 0 0 5.99.025L11 10z',
            ],
            [
                'name' => 'Hair dryer',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'popular' => 1,
                'iconPath' => 'M14 27l-.005.2a4 4 0 0 1-3.789 3.795L10 31H4v-2h6l.15-.005a2 2 0 0 0 1.844-1.838L12 27zM10 1c.536 0 1.067.047 1.58.138l.38.077 17.448 3.64a2 2 0 0 1 1.585 1.792l.007.166v6.374a2 2 0 0 1-1.431 1.917l-.16.04-13.554 2.826 1.767 6.506a2 2 0 0 1-1.753 2.516l-.177.008H11.76a2 2 0 0 1-1.879-1.315l-.048-.15-1.88-6.769A9 9 0 0 1 10 1zm5.692 24l-1.799-6.621-1.806.378a8.998 8.998 0 0 1-1.663.233l-.331.008L11.76 25zM10 3a7 7 0 1 0 1.32 13.875l.331-.07L29 13.187V6.813L11.538 3.169A7.027 7.027 0 0 0 10 3zm0 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6z',
            ],
            [
                'name' => 'Heating',
                'description' => 'Free of charge',
                'accessoriesType' => 'heating_and_cooling',
                'popular' => 1,
                'iconPath' => 'M16 0a5 5 0 0 1 4.995 4.783L21 5l.001 12.756.26.217a7.984 7.984 0 0 1 2.717 5.43l.017.304L24 24a8 8 0 1 1-13.251-6.036l.25-.209L11 5A5 5 0 0 1 15.563.019l.22-.014zm0 2a3 3 0 0 0-2.995 2.824L13 5v13.777l-.428.298a6 6 0 1 0 7.062.15l-.205-.15-.428-.298L19 11h-4V9h4V7h-4V5h4a3 3 0 0 0-3-3zm1 11v7.126A4.002 4.002 0 0 1 16 28a4 4 0 0 1-1-7.874V13zm-1 9a2 2 0 1 0 0 4 2 2 0 0 0 0-4z',
            ],
            [
                'name' => 'Kitchen',
                'description' => 'Space where guests can cook their own meals',
                'accessoriesType' => 'kitchen',
                'popular' => 1,
                'iconPath' => 'M26 1a5 5 0 0 1 5 5c0 6.389-1.592 13.187-4 14.693V31h-2V20.694c-2.364-1.478-3.942-8.062-3.998-14.349L21 6l.005-.217A5 5 0 0 1 26 1zm-9 0v18.118c2.317.557 4 3.01 4 5.882 0 3.27-2.183 6-5 6s-5-2.73-5-6c0-2.872 1.683-5.326 4-5.882V1zM2 1h1c4.47 0 6.934 6.365 6.999 18.505L10 21H3.999L4 31H2zm14 20c-1.602 0-3 1.748-3 4s1.398 4 3 4 3-1.748 3-4-1.398-4-3-4zM4 3.239V19h3.995l-.017-.964-.027-.949C7.673 9.157 6.235 4.623 4.224 3.364l-.12-.07zm19.005 2.585L23 6l.002.31c.045 4.321 1.031 9.133 1.999 11.39V3.17a3.002 3.002 0 0 0-1.996 2.654zm3.996-2.653v14.526C27.99 15.387 29 10.4 29 6a3.001 3.001 0 0 0-2-2.829z',
            ],
        ];

        $allAccessories = [
            [
                'name' => 'Bathroom',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => '',
            ],
            [
                'name' => 'Bidet',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => '',],
            [
                'name' => 'Body soap',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => '',],
            [
                'name' => 'Conditioner',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => '',],
            [
                'name' => 'Hot water',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => 'M16 32c6.627 0 12-5.373 12-12 0-6.218-3.671-12.51-10.924-18.889L16 .18l-1.076.932C7.671 7.491 4 13.782 4 20c0 6.577 5.397 12 12 12zm0-2c-5.496 0-10-4.525-10-10 0-5.327 3.115-10.882 9.424-16.65l.407-.37.169-.149.576.518c6.043 5.526 9.156 10.855 9.407 15.977l.013.34L26 20c0 5.523-4.477 10-10 10zm-3.452-5.092a8.954 8.954 0 0 1 2.127-4.932l.232-.26.445-.462a6.973 6.973 0 0 0 1.827-4.416l.007-.306-.006-.307-.007-.11a6.03 6.03 0 0 0-2.009-.057 4.979 4.979 0 0 1-1.443 4.008 10.951 10.951 0 0 0-2.87 5.016 6.034 6.034 0 0 0 1.697 1.826zM16 26l.253-.005.25-.016-.003-.137c0-1.32.512-2.582 1.464-3.533a10.981 10.981 0 0 0 3.017-5.656 6.026 6.026 0 0 0-1.803-1.743 8.971 8.971 0 0 1-2.172 5.493l-.228.255-.444.462a6.96 6.96 0 0 0-1.827 4.415l-.006.276c.48.123.982.189 1.499.189z',],
            [
                'name' => 'Outdoor shower',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => '',],
            [
                'name' => 'Shampoo',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => 'M20 1v2h-3v2h1a2 2 0 0 1 1.995 1.85L20 7v2a4 4 0 0 1 3.995 3.8L24 13v14a4 4 0 0 1-3.8 3.995L20 31h-8a4 4 0 0 1-3.995-3.8L8 27V13a4 4 0 0 1 3.8-3.995L12 9V7a2 2 0 0 1 1.85-1.995L14 5h1V3H8V1zm2 21H10v5a2 2 0 0 0 1.85 1.995L12 29h8a2 2 0 0 0 1.995-1.85L22 27zm0-6H10v4h12zm-2-5h-8a2 2 0 0 0-1.995 1.85L10 13v1h12v-1a2 2 0 0 0-2-2zm-2-4h-4v2h4z',],
            [
                'name' => 'Shower gel',
                'description' => '',
                'accessoriesType' => 'bathroom',
                'iconPath' => '',],
            [
                'name' => 'Bed linens',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => 'M19.586 2a2 2 0 0 1 1.284.467l.13.119L29.414 11a2 2 0 0 1 .578 1.238l.008.176V25a5 5 0 0 1-4.783 4.995L25 30H4a2 2 0 0 1-1.995-1.85L2 28V7a5 5 0 0 1 4.783-4.995L7 2zM7 4a3 3 0 0 0-2.995 2.824L4 7v14a3 3 0 0 0 2.824 2.995L7 24h19v2H7a4.978 4.978 0 0 1-3-1v3h21a3 3 0 0 0 2.995-2.824L28 25v-3H6v-2h22v-6h-5a5 5 0 0 1-4.995-4.783L18 9V4zm20.586 8L20 4.415V9a3 3 0 0 0 2.824 2.995L23 12z',],
            [
                'name' => 'Clothing storage',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => 'M25 1a3 3 0 0 1 2.995 2.824L28 4v22a3 3 0 0 1-2.824 2.995L25 29v2h-2v-2H9v2H7v-2a3 3 0 0 1-2.995-2.824L4 26V4a3 3 0 0 1 2.824-2.995L7 1h18zm1 20H6v5a1 1 0 0 0 .883.993L7 27h18a1 1 0 0 0 .993-.883L26 26v-5zm-10 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm9-20h-8v16h9V4a1 1 0 0 0-.883-.993L25 3zM15 3H7a1 1 0 0 0-.993.883L6 4v15h9V3zm-3 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm8 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z',],
            [
                'name' => 'Dryer',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => '',],
            [
                'name' => 'Drying rack for clothing',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => '',],
            [
                'name' => 'Extra pillows and blankets',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => 'M26.805 4.006a2.995 2.995 0 0 0-1.873.82l-.022.022-.113-.021a47.19 47.19 0 0 0-16.86-.132l-.848.153-.021-.022A3 3 0 0 0 2 7l.007.211c.04.56.234 1.09.554 1.536l.025.033-.044.278c-.718 4.722-.717 9.14.001 13.88l.044.279-.025.035A3 3 0 0 0 5 28l.195-.006a2.995 2.995 0 0 0 1.873-.82l.021-.023.114.022a47.19 47.19 0 0 0 16.86.132l.847-.154.022.023A3 3 0 0 0 30 25l-.007-.212a2.992 2.992 0 0 0-.554-1.536l-.027-.034.045-.28c.718-4.74.719-9.158 0-13.88l-.044-.278.026-.033A3 3 0 0 0 27 4l-.194.006zM27 6a1 1 0 0 1 .676 1.737l-.4.367.09.534c.84 5.04.84 9.662-.001 14.723l-.09.534.4.367a1 1 0 1 1-1.525 1.266l-.367-.59-.68.138a45.287 45.287 0 0 1-18.205 0l-.68-.138-.368.59a1 1 0 1 1-1.525-1.265l.4-.367-.09-.535c-.841-5.06-.842-9.683 0-14.723l.088-.534-.399-.367A1 1 0 1 1 5.85 6.473l.367.59.68-.139a45.287 45.287 0 0 1 18.205 0l.68.138.368-.59A.998.998 0 0 1 27 6z',],
            [
                'name' => 'Hangers',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => 'M16 2a5 5 0 0 1 1.661 9.717 1.002 1.002 0 0 0-.653.816l-.008.126v.813l13.23 9.052a3 3 0 0 1 1.299 2.279l.006.197a3 3 0 0 1-3 3H3.465a3 3 0 0 1-1.694-5.476L15 13.472v-.813c0-1.211.724-2.285 1.816-2.757l.176-.07a3 3 0 1 0-3.987-3.008L13 7h-2a5 5 0 0 1 5-5zm0 13.211L2.9 24.175A1 1 0 0 0 3.465 26h25.07a1 1 0 0 0 .565-1.825z',],
            [
                'name' => 'Iron',
                'description' => 'In a separate shared room.',
                'accessoriesType' => 'bedroom',
                'iconPath' => 'M12 28a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm4 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm4 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-6-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm4 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM16.027 3l.308.004a12.493 12.493 0 0 1 11.817 9.48l.07.3 1.73 7.782.027.144a2 2 0 0 1-1.83 2.285L28 23H2.247l-.15-.005a2 2 0 0 1-1.844-1.838L.247 21v-7l.004-.217a5 5 0 0 1 4.773-4.778L5.247 9h9V5h-14V3zm11.528 16H2.245l.002 2H28zM16.247 5.002V11h-11l-.177.005a3 3 0 0 0-2.818 2.819L2.247 14l-.001 3H27.11l-.84-3.783-.067-.28a10.494 10.494 0 0 0-9.596-7.921l-.292-.012z',],
            [
                'name' => 'Mosquito net',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => '',],
            [
                'name' => 'Room-darkening shades',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => '',],
            [
                'name' => 'Safe',
                'description' => '',
                'accessoriesType' => 'bedroom',
                'iconPath' => '',],
            [
                'name' => 'Washer',
                'description' => 'In a separate shared room.',
                'accessoriesType' => 'bedroom',
                'iconPath' => 'm26.2875958 2c1.4943151.00218728 2.7591731 1.1037772 2.9663548 2.58389031.4975641 3.56108628.7460494 7.36641109.7460494 11.41610969s-.2484853 7.8550234-.7460839 11.4163568c-.1988613 1.4206714-1.3725089 2.4927235-2.7894512 2.5781497l-.1783321.0054935h-20.57372863c-1.49431506-.0021873-2.7591731-1.1037772-2.96635481-2.5838903-.49756403-3.5610863-.74604936-7.3664111-.74604936-11.4161097s.24848533-7.85502341.74608392-11.41635683c.19886126-1.42067133 1.37250888-2.49272345 2.78945123-2.57814972l.17833204-.00549345zm-.001463 1.99999893h-20.57080259c-.49804876.00072866-.919536.36781024-.98852197.86064804-.48434104 3.46644876-.72680824 7.17961153-.72680824 11.13935193 0 3.9597426.2424672 7.6729054.72677368 11.139107.06371126.4551553.42774918.8029468.87395616.8543314l.11313735.0065616h20.57080261c.4980488-.0007265.919536-.3678081.988522-.8606459.484341-3.4664487.7268082-7.1796115.7268082-11.1393541 0-3.9597404-.2424672-7.67290317-.7267737-11.13910479-.0690205-.49308494-.4905077-.86016652-.9870935-.86089518zm-10.2861328 3.00000107c4.9705627 0 9 4.0294373 9 9s-4.0294373 9-9 9-9-4.0294373-9-9 4.0294373-9 9-9zm-5.8414878 7.4999981c-.34108957-.0001654-.67972606.0242467-1.01356612.0725599-.09481995.4612974-.14494608.9385159-.14494608 1.4274401 0 3.8659951 3.1340068 7 7 7 2.7319686 0 5.0983993-1.5650514 6.2516347-3.8475004-.2599201.0223771-.5214932.0336332-.7841237.0335052-2.2620527-.0011072-4.4437323-.8444711-6.1250979-2.4078908l-.2367463-.2282308c-1.3302626-1.3311149-3.1018689-2.0498832-4.9471546-2.0498832zm5.8414878-5.4999981c-2.5924559 0-4.8557544 1.4092904-6.06558041 3.5035562l.22458041-.0035562c2.2624645 0 4.4444831.8435532 6.1243595 2.4073778l.2365208.22829c1.3314314 1.3305789 3.1034818 2.049432 4.9486075 2.0503351.4925113.0002394.9799732-.0508503 1.4553384-.1512223.0503426-.3388527.0761738-.6838001.0761738-1.0347806 0-3.8659932-3.1340068-7-7-7zm-9-3c.55228475 0 1 .44771525 1 1s-.44771525 1-1 1-1-.44771525-1-1 .44771525-1 1-1z',],
            [
                'name' => 'Baby bath',
                'description' => '',
                'accessoriesType' => 'family',
                'iconPath' => '',],
            [
                'name' => 'Baby monitor',
                'description' => '',
                'accessoriesType' => 'family',
                'iconPath' => '',],
            [
                'name' => 'Children\'s bikes',
                'description' => '',
                'accessoriesType' => 'family',
                'iconPath' => '',],
            [
                'name' => 'Crib',
                'description' => '',
                'accessoriesType' => 'family',
                'iconPath' => '',],
            [
                'name' => 'High chair',
                'description' => '',
                'accessoriesType' => 'family',
                'iconPath' => '',],
            [
                'name' => 'Outdoor playground',
                'description' => 'An outdoor area equipped with play structures for children',
                'accessoriesType' => 'family',
                'iconPath' => '',],
            [
                'name' => 'Ceiling fan',
                'description' => '',
                'accessoriesType' => 'heating_and_cooling',
                'iconPath' => '',],
            [
                'name' => 'Indoor fireplace',
                'description' => '',
                'accessoriesType' => 'heating_and_cooling',
                'iconPath' => '',],
            [
                'name' => 'Portable fans',
                'description' => '',
                'accessoriesType' => 'heating_and_cooling',
                'iconPath' => '',],
            [
                'name' => 'Carbon monoxide alarm',
                'description' => '',
                'accessoriesType' => 'safety_security',
                'iconPath' => '',],
            [
                'name' => 'Fire extinguisher',
                'description' => '',
                'accessoriesType' => 'safety_security',
                'iconPath' => '',],
            [
                'name' => 'First aid kit',
                'description' => '',
                'accessoriesType' => 'safety_security',
                'iconPath' => 'M26 3a5 5 0 0 1 4.995 4.783L31 8v16a5 5 0 0 1-4.783 4.995L26 29H6a5 5 0 0 1-4.995-4.783L1 24V8a5 5 0 0 1 4.783-4.995L6 3zm0 2H6a3 3 0 0 0-2.995 2.824L3 8v16a3 3 0 0 0 2.824 2.995L6 27h20a3 3 0 0 0 2.995-2.824L29 24V8a3 3 0 0 0-2.824-2.995zm-7 4v4h4v6h-4v4h-6v-4.001L9 19v-6l4-.001V9zm-2.001 2h-2L15 14.999h-4.001V17L15 16.998 14.999 21h2L17 17h3.999v-2H17z',],
            [
                'name' => 'Smoke alarm',
                'description' => '',
                'accessoriesType' => 'safety_security',
                'iconPath' => '',],
            [
                'name' => 'Pocket wifi',
                'description' => '',
                'accessoriesType' => 'internet',
                'iconPath' => 'm15.9999 20.33323c2.0250459 0 3.66667 1.6416241 3.66667 3.66667s-1.6416241 3.66667-3.66667 3.66667-3.66667-1.6416241-3.66667-3.66667 1.6416241-3.66667 3.66667-3.66667zm0 2c-.9204764 0-1.66667.7461936-1.66667 1.66667s.7461936 1.66667 1.66667 1.66667 1.66667-.7461936 1.66667-1.66667-.7461936-1.66667-1.66667-1.66667zm.0001-7.33323c3.5168171 0 6.5625093 2.0171251 8.0432368 4.9575354l-1.5143264 1.5127043c-1.0142061-2.615688-3.5549814-4.4702397-6.5289104-4.4702397s-5.5147043 1.8545517-6.52891042 4.4702397l-1.51382132-1.5137072c1.48091492-2.939866 4.52631444-4.9565325 8.04273174-4.9565325zm.0001-5.3332c4.9804693 0 9.3676401 2.540213 11.9365919 6.3957185l-1.4470949 1.4473863c-2.1746764-3.5072732-6.0593053-5.8431048-10.489497-5.8431048s-8.31482064 2.3358316-10.48949703 5.8431048l-1.44709488-1.4473863c2.56895177-3.8555055 6.95612261-6.3957185 11.93659191-6.3957185zm-.0002-5.3336c6.4510616 0 12.1766693 3.10603731 15.7629187 7.9042075l-1.4304978 1.4309874c-3.2086497-4.44342277-8.4328305-7.3351949-14.3324209-7.3351949-5.8991465 0-11.12298511 2.89133703-14.33169668 7.334192l-1.43047422-1.4309849c3.58629751-4.79760153 9.31155768-7.9032071 15.7621709-7.9032071z',],
            [
                'name' => 'Baking sheet',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Barbecue utensils',
                'description' => 'Grill, charcoal, bamboo skewers/iron skewers, etc.',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M12.994 2h2c-.002 2.062-.471 3.344-1.765 5.424l-.753 1.183c-.867 1.391-1.278 2.301-1.418 3.393H9.043c.1-1.069.378-1.966.903-3H6c0 5.523 4.477 10 10 10 5.43 0 9.848-4.327 9.996-9.72L26 9l-3.765.001c-.704 1.177-1.05 2.014-1.177 2.999h-2.015c.15-1.613.708-2.836 1.91-4.728l.563-.88c1.116-1.791 1.477-2.784 1.478-4.393h2c-.002 1.919-.408 3.162-1.506 5L28 7v2c0 .682-.057 1.35-.166 2H30v2h-2.683a12.039 12.039 0 0 1-5.896 6.709l4.49 9.877-1.821.828-2.006-4.415H17V30h-2v-4H9.916L7.91 30.413l-1.82-.828 4.49-9.877A12.039 12.039 0 0 1 4.682 13H2v-2h2.166a12.058 12.058 0 0 1-.162-1.695L4 9V7h7.127l.389-.609c1.116-1.79 1.477-2.783 1.478-4.392zm-.56 18.461L10.824 24H15v-3.04a11.95 11.95 0 0 1-2.566-.498zM17 20.96v3.04h4.175l-1.609-3.538c-.684.213-1.395.366-2.126.453zm.994-18.96h2c-.002 2.063-.471 3.345-1.765 5.425l-.753 1.183c-.867 1.391-1.278 2.301-1.418 3.393h-2.015c.15-1.613.708-2.836 1.91-4.728l.563-.88c1.116-1.791 1.477-2.784 1.478-4.393z',],
            [
                'name' => 'Bread maker',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Blender',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Coffee',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Coffee maker',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Dinning table',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M31 9v21h-2v-7h-6v7h-2v-7a2 2 0 0 1 1.85-1.995L23 21h6V9h2zM3 9v12h6a2 2 0 0 1 1.995 1.85L11 23v7H9v-7H3v7H1V9h2zm14-2v2.083a6.002 6.002 0 0 1 4.996 5.692L22 15h5v2H17v13h-2V17H5v-2h5a6.002 6.002 0 0 1 5-5.917V7h2zm-1 4a4 4 0 0 0-3.995 3.8L12 15h8a4 4 0 0 0-4-4z',],
            [
                'name' => 'Dishwasher',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Fridge',
                'description' => 'Contains a section for freezing',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M25 1a2 2 0 0 1 1.995 1.85L27 3v26a2 2 0 0 1-1.85 1.995L25 31H7a2 2 0 0 1-1.995-1.85L5 29V3a2 2 0 0 1 1.85-1.995L7 1zm0 10H7v18h18zm-15 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM25 3H7v6h18zM10 5a1 1 0 1 1 0 2 1 1 0 0 1 0-2z',],
            [
                'name' => 'Hot water kettle',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M26 28v2H6v-2h20zM16 1a8.638 8.638 0 0 1 7.834 5H28a1 1 0 0 1 .997 1.076c-.295 3.873-1.576 6.45-3.894 7.564l.893 10.273a1 1 0 0 1-.88 1.08L25 26H7a1 1 0 0 1-1-.971l.004-.116L7.397 8.887c.026-.3.068-.597.124-.887H5a1 1 0 0 0-.993.883L4 9v10H2V9a3 3 0 0 1 2.824-2.995L5 6h3.165A8.638 8.638 0 0 1 16 1zm6.431 7H9.57a6.647 6.647 0 0 0-.138.7l-.041.36L8.09 24h15.819L22.61 9.06A6.67 6.67 0 0 0 22.431 8zm-5.45 3c-.147 2.02-1.163 4.144-2.7 5.783l-.231.238a6.96 6.96 0 0 0-1.984 3.98h-2.015a8.956 8.956 0 0 1 2.356-5.158l.228-.236c1.304-1.304 2.18-3.034 2.339-4.607h2.007zm4 0c.013.166.019.333.019.5-.001 2.164-1.054 4.508-2.72 6.283l-.23.238A6.967 6.967 0 0 0 16.28 21h-2.064a8.955 8.955 0 0 1 2.191-4.157l.228-.236C18.08 15.163 19 13.196 19 11.499a4.94 4.94 0 0 0-.026-.5h2.008zm5.907-3h-2.409c.04.207.073.418.098.63l.026.257.306 3.518c.98-.792 1.634-2.165 1.946-4.18L26.888 8zM16 3a6.633 6.633 0 0 0-5.552 3h11.104a6.635 6.635 0 0 0-5.043-2.98l-.275-.016L16 3z',],
            [
                'name' => 'Kitchenette',
                'description' => 'Space where guests can heat u and refrigerate food',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M26 1a5 5 0 0 1 5 5c0 6.389-1.592 13.187-4 14.693V31h-2V20.694c-2.364-1.478-3.942-8.062-3.998-14.349L21 6l.005-.217A5 5 0 0 1 26 1zm-9 0v18.118c2.317.557 4 3.01 4 5.882 0 3.27-2.183 6-5 6s-5-2.73-5-6c0-2.872 1.683-5.326 4-5.882V1zM2 1h1c4.47 0 6.934 6.365 6.999 18.505L10 21H3.999L4 31H2zm14 20c-1.602 0-3 1.748-3 4s1.398 4 3 4 3-1.748 3-4-1.398-4-3-4zM4 3.239V19h3.995l-.017-.964-.027-.949C7.673 9.157 6.235 4.623 4.224 3.364l-.12-.07zm19.005 2.585L23 6l.002.31c.045 4.321 1.031 9.133 1.999 11.39V3.17a3.002 3.002 0 0 0-1.996 2.654zm3.996-2.653v14.526C27.99 15.387 29 10.4 29 6a3.001 3.001 0 0 0-2-2.829z',],
            [
                'name' => 'Microwave',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Mini fridge',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Oven',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M28 2a2 2 0 0 1 1.995 1.85L30 4v24a2 2 0 0 1-1.85 1.995L28 30H4a2 2 0 0 1-1.995-1.85L2 28V4a2 2 0 0 1 1.85-1.995L4 2zm0 10H4v16h24zm-2 2v12H6V14zm-2 2H8v8h16zm4-12H4v6h24zm-3 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-6 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-6 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM7 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z',],
            [
                'name' => 'Refrigerator',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M25 1a2 2 0 0 1 1.995 1.85L27 3v26a2 2 0 0 1-1.85 1.995L25 31H7a2 2 0 0 1-1.995-1.85L5 29V3a2 2 0 0 1 1.85-1.995L7 1zm0 10H7v18h18zm-15 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM25 3H7v6h18zM10 5a1 1 0 1 1 0 2 1 1 0 0 1 0-2z',],
            [
                'name' => 'Rice maker',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Stove',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => 'M27 0a2 2 0 0 1 1.995 1.85L29 2v26a2 2 0 0 1-1.85 1.995L27 30H5a2 2 0 0 1-1.995-1.85L3 28V2A2 2 0 0 1 4.85.005L5 0zm0 2H5v26h22zm-3 22a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-5.333 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm-5.334 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2zM8 24a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm13-10a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm-10 0a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm10 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-10 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM21 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8zM11 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm10 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM11 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4z',],
            [
                'name' => 'Toaster',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Trash compactor',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Wine glasses',
                'description' => '',
                'accessoriesType' => 'kitchen',
                'iconPath' => '',],
            [
                'name' => 'Laundromat',
                'description' => 'Available on the place',
                'accessoriesType' => 'location',
                'iconPath' => '',],
            [
                'name' => 'Courtyard view',
                'description' => '',
                'accessoriesType' => 'location',
                'iconPath' => 'M16 1a5 5 0 0 1 5 5 5 5 0 0 1 0 10 5.002 5.002 0 0 1-4 4.9v4.287C18.652 23.224 21.153 22 23.95 22a8.94 8.94 0 0 1 3.737.814l.313.15.002 2.328A6.963 6.963 0 0 0 23.95 24c-3.542 0-6.453 2.489-6.93 5.869l-.02.15-.006.098a1 1 0 0 1-.876.876L16 31a1 1 0 0 1-.974-.77l-.02-.124C14.635 26.623 11.615 24 7.972 24a6.963 6.963 0 0 0-3.97 1.234l.002-2.314c1.218-.6 2.57-.92 3.968-.92 2.818 0 5.358 1.24 7.028 3.224V20.9a5.002 5.002 0 0 1-3.995-4.683L11 16l-.217-.005a5 5 0 0 1 0-9.99L11 6l.005-.217A5 5 0 0 1 16 1zm2.864 14.1c-.811.567-1.799.9-2.864.9s-2.053-.333-2.864-.9l-.062.232a3 3 0 1 0 5.851.001zM11 8a3 3 0 1 0 .667 5.926l.234-.062A4.977 4.977 0 0 1 11 11c0-1.065.333-2.053.9-2.864l-.232-.062A3.013 3.013 0 0 0 11 8zm10 0c-.228 0-.45.025-.667.074l-.234.062C20.667 8.947 21 9.935 21 11a4.977 4.977 0 0 1-.9 2.864l.232.062A3 3 0 1 0 21 8zm-5 0a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-5a3 3 0 0 0-2.926 3.667l.062.234C13.947 6.333 14.935 6 16 6s2.053.333 2.864.9l.062-.232A3 3 0 0 0 16 3z',],
            [
                'name' => 'Private entrance',
                'description' => 'Available on the place',
                'accessoriesType' => 'location',
                'iconPath' => '',],
            [
                'name' => 'Backyard',
                'description' => 'An open space on the property',
                'accessoriesType' => 'outdoors',
                'iconPath' => 'M16 1a5 5 0 0 1 5 5 5 5 0 0 1 0 10 5.002 5.002 0 0 1-4 4.9v4.287C18.652 23.224 21.153 22 23.95 22a8.94 8.94 0 0 1 3.737.814l.313.15.002 2.328A6.963 6.963 0 0 0 23.95 24c-3.542 0-6.453 2.489-6.93 5.869l-.02.15-.006.098a1 1 0 0 1-.876.876L16 31a1 1 0 0 1-.974-.77l-.02-.124C14.635 26.623 11.615 24 7.972 24a6.963 6.963 0 0 0-3.97 1.234l.002-2.314c1.218-.6 2.57-.92 3.968-.92 2.818 0 5.358 1.24 7.028 3.224V20.9a5.002 5.002 0 0 1-3.995-4.683L11 16l-.217-.005a5 5 0 0 1 0-9.99L11 6l.005-.217A5 5 0 0 1 16 1zm2.864 14.1c-.811.567-1.799.9-2.864.9s-2.053-.333-2.864-.9l-.062.232a3 3 0 1 0 5.851.001zM11 8a3 3 0 1 0 .667 5.926l.234-.062A4.977 4.977 0 0 1 11 11c0-1.065.333-2.053.9-2.864l-.232-.062A3.013 3.013 0 0 0 11 8zm10 0c-.228 0-.45.025-.667.074l-.234.062C20.667 8.947 21 9.935 21 11a4.977 4.977 0 0 1-.9 2.864l.232.062A3 3 0 1 0 21 8zm-5 0a3 3 0 1 0 0 6 3 3 0 0 0 0-6zm0-5a3 3 0 0 0-2.926 3.667l.062.234C13.947 6.333 14.935 6 16 6s2.053.333 2.864.9l.062-.232A3 3 0 0 0 16 3z',],
            [
                'name' => 'BBQ grill',
                'description' => 'In a separate shared room.',
                'accessoriesType' => 'outdoors',
                'iconPath' => 'M12.994 2h2c-.002 2.062-.471 3.344-1.765 5.424l-.753 1.183c-.867 1.391-1.278 2.301-1.418 3.393H9.043c.1-1.069.378-1.966.903-3H6c0 5.523 4.477 10 10 10 5.43 0 9.848-4.327 9.996-9.72L26 9l-3.765.001c-.704 1.177-1.05 2.014-1.177 2.999h-2.015c.15-1.613.708-2.836 1.91-4.728l.563-.88c1.116-1.791 1.477-2.784 1.478-4.393h2c-.002 1.919-.408 3.162-1.506 5L28 7v2c0 .682-.057 1.35-.166 2H30v2h-2.683a12.039 12.039 0 0 1-5.896 6.709l4.49 9.877-1.821.828-2.006-4.415H17V30h-2v-4H9.916L7.91 30.413l-1.82-.828 4.49-9.877A12.039 12.039 0 0 1 4.682 13H2v-2h2.166a12.058 12.058 0 0 1-.162-1.695L4 9V7h7.127l.389-.609c1.116-1.79 1.477-2.783 1.478-4.392zm-.56 18.461L10.824 24H15v-3.04a11.95 11.95 0 0 1-2.566-.498zM17 20.96v3.04h4.175l-1.609-3.538c-.684.213-1.395.366-2.126.453zm.994-18.96h2c-.002 2.063-.471 3.345-1.765 5.425l-.753 1.183c-.867 1.391-1.278 2.301-1.418 3.393h-2.015c.15-1.613.708-2.836 1.91-4.728l.563-.88c1.116-1.791 1.477-2.784 1.478-4.393z',],
            [
                'name' => 'Boat slip',
                'description' => '',
                'accessoriesType' => 'outdoors',
                'iconPath' => '',],
            [
                'name' => 'Kayak',
                'description' => '',
                'accessoriesType' => 'outdoors',
                'iconPath' => '',],
            [
                'name' => 'Outdoor dinig area',
                'description' => '',
                'accessoriesType' => 'outdoors',
                'iconPath' => 'M29 15v16h-2v-6h-6v6h-2v-6l.005-.15a2 2 0 0 1 1.838-1.844L21 23h6v-8zM5 15v8h6a2 2 0 0 1 1.995 1.85L13 25v6h-2v-6H5v6H3V15zM16 1a15 15 0 0 1 13.556 8.571 1 1 0 0 1-.79 1.423l-.113.006H17v8h8v2h-8v10h-2V21H7v-2h8v-8H3.347a1 1 0 0 1-.946-1.323l.043-.106A15 15 0 0 1 16 1zm0 2C11.71 3 7.799 5.097 5.402 8.468l-.197.284L5.042 9h21.915l-.162-.248a12.995 12.995 0 0 0-10.1-5.734l-.365-.014z',],
            [
                'name' => 'Balcony or terrace',
                'description' => '',
                'accessoriesType' => 'outdoors',
                'iconPath' => 'M23 1a2 2 0 0 1 1.995 1.85L25 3v16h4v2h-2v8h2v2H3v-2h2v-8H3v-2h4V3a2 2 0 0 1 1.85-1.995L9 1zM9 21H7v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm4 0h-2v8h2zm-10-8H9v6h6zm8 0h-6v6h6zM15 3H9v8h6zm8 0h-6v8h6z',],
            [
                'name' => 'Sun loungers',
                'description' => '',
                'accessoriesType' => 'outdoors',
                'iconPath' => '',],
            [
                'name' => 'Free street parking',
                'description' => '',
                'accessoriesType' => 'parking',
                'iconPath' => 'M26 19a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7 18a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm20.693-5l.42 1.119C29.253 15.036 30 16.426 30 18v9c0 1.103-.897 2-2 2h-2c-1.103 0-2-.897-2-2v-2H8v2c0 1.103-.897 2-2 2H4c-1.103 0-2-.897-2-2v-9c0-1.575.746-2.965 1.888-3.882L4.308 13H2v-2h3v.152l1.82-4.854A2.009 2.009 0 0 1 8.693 5h14.614c.829 0 1.58.521 1.873 1.297L27 11.151V11h3v2h-2.307zM6 25H4v2h2v-2zm22 0h-2v2h2v-2zm0-2v-5c0-1.654-1.346-3-3-3H7c-1.654 0-3 1.346-3 3v5h24zm-3-10h.557l-2.25-6H8.693l-2.25 6H25zm-15 7h12v-2H10v2z',],
            [
                'name' => 'Long term stays allowed',
                'description' => 'Allow stay for multiple days',
                'accessoriesType' => 'services',
                'iconPath' => 'm11.6667 0-.00095 1.666h8.667l.00055-1.666h2l-.00055 1.666 6.00065.00063c1.0543745 0 1.9181663.81587127 1.9945143 1.85073677l.0054857.14926323v15.91907c0 .4715696-.1664445.9258658-.4669028 1.2844692l-.1188904.1298308-8.7476886 8.7476953c-.3334303.3332526-.7723097.5367561-1.2381975.5778649l-.1758207.0077398h-12.91915c-2.68874373 0-4.88181754-2.1223321-4.99538046-4.7831124l-.00461954-.2168876v-21.66668c0-1.05436021.81587582-1.91815587 1.85073739-1.99450431l.14926261-.00548569 5.999-.00063.00095-1.666zm16.66605 11.666h-24.666v13.6673c0 1.5976581 1.24893332 2.9036593 2.82372864 2.9949072l.17627136.0050928 10.999-.0003.00095-5.6664c0-2.6887355 2.122362-4.8818171 4.7832071-4.9953804l.2168929-.0046196 5.66595-.0006zm-.081 8-5.58495.0006c-1.5977285 0-2.9037573 1.2489454-2.9950071 2.8237299l-.0050929.1762701-.00095 5.5864zm-18.586-16-5.999.00062v5.99938h24.666l.00065-5.99938-6.00065-.00062.00055 1.66733h-2l-.00055-1.66733h-8.667l.00095 1.66733h-2z',],
            [
                'name' => 'Luggage dropoff allowed',
                'description' => 'For guests\' convenience when they have early arrival or late departure',
                'accessoriesType' => 'services',
                'iconPath' => 'M30 29v2H2v-2zM20 1a2 2 0 0 1 1.995 1.85L22 3v2h3a5 5 0 0 1 4.995 4.783L30 10v12a5 5 0 0 1-4.783 4.995L25 27H7a5 5 0 0 1-4.995-4.783L2 22V10a5 5 0 0 1 4.783-4.995L7 5h3V3a2 2 0 0 1 1.85-1.995L12 1zm5 6H7a3 3 0 0 0-2.995 2.824L4 10v12a3 3 0 0 0 2.824 2.995L7 25h18a3 3 0 0 0 2.995-2.824L28 22V10a3 3 0 0 0-3-3zm-8 2v9.5l3.293-3.293 1.414 1.414-4.646 4.647-.114.103a1.5 1.5 0 0 1-1.894 0l-.114-.103-4.646-4.647 1.414-1.414L15 18.5V9zm3-6h-8v2h8z',
            ],
            [
                'name' => 'Self check-in',
                'description' => '',
                'accessoriesType' => 'services',
                'iconPath' => 'm24.3334 1.66675c1.0543745 0 1.9181663.81587127 1.9945143 1.85073677l.0054857.14926323-.00065 24.666 3.00065.00075v2h-26.66665v-2l3-.00075v-24.666c0-1.05436681.81587301-1.91816558 1.850737-1.99451429l.149263-.00548571zm-4.00065 2h-12.666l-.00075 24.66625 12.66675-.00025zm4.00065 0h-2.00065v24.666l2.00025.00025zm-7.0001 11.00002c.7363778 0 1.33333.5969522 1.33333 1.33333s-.5969522 1.33333-1.33333 1.33333-1.33333-.5969522-1.33333-1.33333.5969522-1.33333 1.33333-1.33333z',
            ]
        ];

        Accessories::insert($allAccessories);
        Accessories::insert($requestAccessories);
        Accessories::insert($popularAccessories);
        ApartmentReviews::insert($apartmentReviews);
    }

}
