/**
 * LIS development
 *
 * @link      https://github.com/parnustk/lisbackend
 * @copyright Copyright (c) 2016 LIS dev team
 * @license   https://opensource.org/licenses/MIT MIT License
 */

(function () {
    'use strict';

    define([], function () {
        var t = {
            et: {
                LIS_LOGIN_ERROR: 'Sisestatud kasutajanimi või parool on vale. Palun proovige uuesti.',
                LIS_REGISTER_ERROR: 'Kasutaja loomine ebaõnnestus. Palun võtke ühendust kooli haldustöötajaga.',
                LIS_LOGIN_GREETING: 'Sisselogimine',
                LIS_REGISTER_GREETING:'Loo uus kasutaja',
                LIS_REPEAT_PASSWORD:'Korda salasõna',
                LIS_EMAIL: 'E-posti aadress',
                LIS_PASSWORD: 'Salasõna',
                LIS_LOGIN: 'Logi sisse',
                LIS_LOGOUT: 'Logi välja',
                LIS_NAME: 'Nimi',
                LIS_FIRSTNAME: 'Eesnimi',
                LIS_LASTNAME: 'Perekonnanimi',
                LIS_CREATE: 'Loo',
                LIS_DELETE: 'Kustuta',
                LIS_CLEAR: 'Tühjenda',
                LIS_FILTER: 'Filtreeri',
                LIS_TRASHED: 'Prügikastis',
                LIS_NAME_FILTER: 'Nime filter',
                LIS_DESCRIPTION: 'Kirjeldus',
                LIS_PERSONALCODE: 'Isikukood',
                LIS_LANGUAGE: 'Keel',
                LIS_REGISTER:'Registreeru',
                LIS_PASSWORD_REQUIREMENTS:'Salasõna pikkus peab olema 8-20 märki, milles on vähemalt üks suur täht, üks väike täht ja üks number. Salasõna ei tohi sisaldada täpitähti ja tühikuid.',

                LIS_CREATE_NEW_ROOM: 'Uus ruum',
                LIS_ROOM_GRID_FILTERS: 'Ruumide filter',
                LIS_CREATE_NEW_SUBJECTROUND: 'Loo uus õppeaine',
                LIS_SUBJECTROUND_GRID_FILTERS: 'Õppeainete filtrid',
                LIS_CONTACTLESSON_VIEW: 'Kontakttunnid',
                LIS_ABSENCEREASON_VIEW: 'Puudumise põhjused',
                LIS_CREATE_NEW_ABSENCEREASON: 'Loo uus puudumise põhjus',
                ABSENCEREASON_GRID_FILTERS: 'Puudumise põhjuste filter',
                LIS_ABSENCE_VIEW: 'Puudumised',
                LIS_CREATE_NEW_ABSENCE: 'Loo uus puudumine',
                SELECT_AN_ABSENCEREASON: 'Vali puudumise põhjus',
                SELECT_A_STUDENT: 'Vali õpilane',
                SELECT_A_CONTACTLESSON: 'Vali kontakttund',
                ABSENCE_GRID_FILTERS: 'Puudumiste filtrid',
                SELECT_OR_SEARCH_AN_ABSENCEREASON: 'Vali või otsi puudumise põhjuse järgi',
                SELECT_OR_SEARCH_A_STUDENT: 'Vali või otsi õpilase järgi',
                SELECT_OR_SEARCH_A_CONTACTLESSON: 'Vali või otsi kontakttunni järgi',
                LIS_VOCATION_VIEW: 'Erialad',
                LIS_CREATE_NEW_VOCATION: 'Loo uus eriala',
                LIS_VOCATIONCODE: 'Eriala kood',
                LIS_DURATIONEKAP: 'Kestus (EKAP)',
                VOCATION_GRID_FILTERS: 'Erialade filtrid',
                SEARCH_A_NAME: 'Otsi nime järgi',
                SEARCH_A_VOCATIONCODE: 'Otsi eriala koodi järgi',
                SEARCH_A_DURATIONEKAP: 'Otsi kestuse (EKAP) järgi',
                LIS_GRADECHOICE_VIEW: 'Hinde valikud',
                LIS_CREATE_NEW_GRADECHOICE: 'Loo uus hinde valik',
                GRADECHOICE_GRID_FILTERS: 'Hinde valikute filter',
                LIS_MODULETYPE_VIEW: 'Mooduli tüübid',
                LIS_CREATE_NEW_MODULETYPE: 'Loo uus mooduli tüüp',
                MODULETYPE_GRID_FILTERS: 'Mooduli tüüpide filter',
                LIS_STUDENT_VIEW: 'Õpilased',
                LIS_CREATE_NEW_STUDENT: 'Loo uus õpilane',
                SEARCH_A_FIRSTNAME: 'Otsi eesnime järgi',
                SEARCH_A_LASTNAME: 'Otsi perekonnanime järgi',
                SEARCH_AN_EMAIL: 'Otsi e-posti aadressi järgi',
                SEARCH_A_PERSONALCODE: 'Otsi koodi järgi',
                STUDENT_GRID_FILTERS: 'Õpilaste filtrid',
                LIS_ADMINISTRATOR_VIEW: 'Administraatorid',
                LIS_CREATE_NEW_ADMINISTRATOR: 'Loo uus administraator',
                ADMINISTRATOR_GRID_FILTERS: 'Administraatorite filtrid',
                LIS_SUBJECT_VIEW: 'Õppekava ained',
                LIS_CREATE_NEW_SUBJECT: 'Loo uus õppekava aine',
                SELECT_A_MODULE: 'Vali moodul',
                SELECT_GRADINGTYPES: 'Vali hindamise tüübid',
                LIS_SUBJECTCODE: 'Õppekava aine kood',
                LIS_DURATIONALLAK: 'Kogu kestus (AK)',
                LIS_DURATIONCONTACTAK: 'Kontakttundide kestus (AK)',
                LIS_DURATIONINDEPENDENTAK: 'Iseseisva töö kestus (AK)',
                SUBJECT_GRID_FILTERS: 'Õppekava ainete filtrid',
                SELECT_OR_SEARCH_A_MODULE: 'Vali või otsi mooduli järgi',
                SELECT_OR_SEARCH_GRADINGTYPES: 'Vali või otsi hindamise tüüpide järgi',
                SEARCH_A_SUBJECTCODE: 'Otsi õppekava aine koodi järgi',
                SEARCH_DURATIONALLAK: 'Otsi kogu kestuse (AK) järgi',
                SEARCH_DURATIONCONTACTAK: 'Otsi kontakttundide kestuse (AK) järgi',
                SEARCH_DURATIONINDEPENDENTAK: 'Otsi iseseisva töö kestuse (AK) järgi',

                LIS_CHECK_FORM_FIELDS:'Kontrollige vormi väljasid',
                LIS_YOU_CAN_LOGIN_NOW:'Võite sisse logida',
                NOT_FOUND:'Antud andmetega õpilast ei leitud',
                LIS_LESSON_DESCRIPTION:'Tunni kirjeldus',
                LIS_UPDATE_DESCRIPTION:'Uuenda kontakttunni kirjeldust',
                LIS_NO_SUBJECTROUND_OR_CONTACTLESSONS_INSERTED:'Õppeainet või kontakttunde pole sisestatud',
                
                LIS_DUEDATE: 'Tähtaeg',
                LIS_INDEPENDENTWORK_VIEW: 'Iseseisvad tööd',
                INDEPENDENDWORK_GRID_FILTERS: 'Filtreeri',
                SELECT_OR_SEARCH_A_SUBJECTROUND: 'Vali või otsi õppeaine järgi',
                SELECT_OR_SEARCH_A_TEACHER: 'Vali või otsi õpetaja järgi',
                LIS_GRADINGTYPE_VIEW: 'Hindamise tüübid',
                LIS_CREATE_NEW_GRADINGTYPE: 'Loo uus hindamise tüüp',
                LIS_GRADINGTYPE_FILTERS: 'Hindamise tüübi filtrid',
                LIS_SEARCH_NAME: 'Otsi nime järgi',
//               Teacher
                LIS_TEACHER_VIEW: "Õpetaja",
                LIS_TEACHER_FILTER: "Õpetaja filtrid",
                LIS_TEACHER_CREATE: "Loo uus õpetaja",
                LIS_TEACHER_GRID_FILTERS: "Õpetajate filtrid",
//                MENÜÜ
                LIS_CURRICULUM: 'Muu',
                LIS_VOCATION: 'Eriala',
                LIS_MODULE: 'Moodul',
                LIS_SUBJECT: 'Õppekava aine',
                LIS_MODULETYPE: 'Mooduli tüüp',
                LIS_GRADECHOICE: 'Hinnete valik',
                LIS_GRADINGTYPE: 'Hindamise tüüp',
                LIS_ROOM: 'Ruumid',
                LIS_DIARY: 'Päevik',
                LIS_CONTACTLESSON: 'Kontakttund',
                LIS_ABSENCE: 'Puudumine',
                LIS_ABSENCEREASON: 'Puudumise põhjus',
                LIS_INDEPENDENTWORK: 'Iseseisev töö',
                LIS_STUDENTGRADE: 'Õpilase hinne',
                LIS_SUBJECTROUND: 'Õppeaine',
                LIS_TIMETABLE: 'Tunniplaan',
                LIS_PERSONS: 'Inimesed',
                LIS_TEACHER: 'Õpetaja',
                LIS_STUDENT: 'Õpilane',
                LIS_ADMINISTRATOR: 'Administraator',
                LIS_STUDENTGROUP: 'Õppegrupp',
                LIS_STUDENTINGROUPS: 'Õpilane gruppides',
                LIS_ME: 'Minu asjad',
                LIS_CHANGE_MY_USER_DATA: 'Muuda oma andmeid',
                LIS_MY_DATA: 'Näita minu andmeid',
                LIS_STUDENTGRADE_VIEW: 'Õpilase hinded',
                STUDENTGRADE_GRID_FILTERS: 'Õpilase hinde filtrid',
                SELECT_OR_SEARCH_A_GRADECHOICE: 'Vali või otsi hinde valiku järgi',
                SELECT_OR_SEARCH_AN_INDEPENDENTWORK: 'Vali või otsi iseseisva töö järgi',
                LIS_NOTES: 'Märkmed',
                LIS_STUDENTGROUP_VIEW: 'Õppegrupid',
                LIS_CREATE_NEW_STUDENTGROUP: 'Loo uus õppegrupp',
                LIS_CHOOSE_VOCATION: 'Vali eriala',
                STUDENTGROUP_GRID_FILTERS: 'Õppegrupi filtrid',
                SELECT_OR_SEARCH_A_VOCATION: 'Vali või otsi eriala järgi',
                LIS_STUDENTINGROUPS_VIEW: 'Õpilased gruppides',
                LIS_CREATE_NEW_STUDENTINGROUPS: 'Loo uus õpilane gruppides',
                SELECT_A_STUDENTGROUP: 'Vali õppegrupp',
                STUDENTINGROUPS_GRID_FILTERS: 'Õpilane gruppides filter',
                LIS_STATUS: 'Staatus',
                SELECT_OR_SEARCH_A_STUDENTGROUP: 'Vali või otsi õppegrupi järgi',
                LIS_CREATE_NEW_CONTACTLESSON: 'Loo uus kontakttund',
                LIS_CHOOSE_ROOM: 'Vali ruum',
                LIS_CHOOSE_ROUND: 'Vali voor',
                LIS_CHOOSE_STUDENTGROUP: 'Vali õppegrupp',
                LIS_CHOOSE_MODULE: 'Vali moodul',
                LIS_CHOOSE_TEACHER: 'Vali õpetaja',
                LIS_DURATIONAK: 'Kestus (AK)',
                LIS_SEQUENCENR: 'Tunni number',
                LIS_LESSONDATE: 'Tunni toimumise aeg',
                LIS_DATE: 'Kuupäev',
                SELECT_OR_SEARCH_A_ROOM: 'Otsi ruumi järgi',
                SEARCH_A_SEQUENCENR: 'Otsi tunni numbri järgi',
                SEARCH_A_LESSONDATE: 'Otsi kestuse järgi',
                LIS_CONTACTLESSONFILTER: 'Kontakttunni filtrid',
                LIS_CHOOSE_MODULETYPE: 'Vali mooduli tüüp',
                LIS_MODULECODE: 'Kood',
                LIS_DURATION: 'Kestus',
                SEARCH_DURATION: 'Otsi kestuse järgi',
                LIS_MODULE_VIEW: 'Moodulid',
                LIS_CREATE_NEW_MODULE: 'Loo uus moodul',
                MODULE_GRID_FILTERS: 'Mooduli filtrid',
                SEARCH_A_MODULECODE: 'Otsi koodi järgi',
                LIS_CREATE_NEW_INDEPENDENTWORK: 'Loo uus iseseisev töö',
                LIS_CHOOSE_SUBJECTROUND: 'Vali õppeaine',
                //timetable
                LIS_TEACHERABSENCEFILTER: 'Filteeri',
                SEARCH_A_STARTLESSONDATE: 'Algus',
                SEARCH_A_ENDLESSONDATE: 'Lõpp',
                LIS_DIARYS:'Päevik',
                LIS_DIARYVIEWFILTER:'Vali õppeaine ja õppegrupp:',
                LIS_DIARY_VIEW:'Päeviku vaade',
                LIS_FILTER_REFRESH:'Filtreeri',
                LIS_SUBJECTROUND_GRADE:'Õppeaine hinne',
                SELF_CREATED_RESTRICTION:'Saad muuta ainult enda loodud andmeid',
                
                LIS_ERROR:'Viga!',
                LIS_HOME_WELCOME:'Avaleht',
                LIS_HOME_GREETING: 'Tere',
                LIS_PARAGRAPH_TEXT:'Tere tulemast Pärnu Saksa Tehnoloogiakooli õppeinfosüsteemi, kus saad mugavalt lisada hindeid, puudumist ning iseseisvaid töid. Probleemide esinemisel võtke palun ühendust kooli haldustöötajaga.'
            },
            en: {
                LIS_EMAIL: 'E-mail address',
                LIS_PASSWORD: 'Password',
                LIS_REPEAT_PASSWORD:'Repeat password',
                LIS_NAME: 'Name',
                LIS_CREATE: 'Create',
                LIS_DELETE: 'Delete',
                LIS_CLEAR: 'Clear',
                LIS_FILTER: 'Filter',
                LIS_TRASHED: 'Trashed',
                LIS_NAME_FILTER: 'Name filter',
                LIS_DESCRIPTION: 'Description',
                LIS_FIRSTNAME: 'First name',
                LIS_LASTNAME: 'Last name',
                LIS_PERSONALCODE: 'Personal code',
                LIS_REGISTER:'Register',
                
                LIS_LOGIN: 'Log in',
                LIS_LOGOUT: 'Log out',
                LIS_LOGIN_GREETING: 'Please log in',
                LIS_LOGIN_ERROR: 'The entered username or password are incorrect. Please try again',
                LIS_REGISTER_ERROR: 'Failed to create new user. Please contact with school administrator.',
                LIS_REGISTER_GREETING:'Create new user',
                
                LIS_LANGUAGE: 'Language',
                LIS_CREATE_NEW_ROOM: 'Create a new room',
                LIS_ROOM_GRID_FILTERS: 'Room filter',
                LIS_CREATE_NEW_SUBJECTROUND: 'Create new subject round',
                LIS_SUBJECTROUND_GRID_FILTERS: 'Subject round filters',
                LIS_CONTACTLESSON_VIEW: 'Contactlesson',
                LIS_CREATE_NEW_ABSENCEREASON: 'Create new absence reason',
                ABSENCEREASON_GRID_FILTERS: 'Absence reasons filter',
                LIS_ABSENCE_VIEW: 'Absences',
                LIS_CREATE_NEW_ABSENCE: 'Create new absence',
                SELECT_AN_ABSENCEREASON: 'Select an absence reason',
                SELECT_A_STUDENT: 'Select a student',
                SELECT_A_CONTACTLESSON: 'Select a contact lesson',
                ABSENCE_GRID_FILTERS: 'Absence filters',
                SELECT_OR_SEARCH_AN_ABSENCEREASON: 'Select or search an absence reason',
                SELECT_OR_SEARCH_A_STUDENT: 'Select or search a student',
                SELECT_OR_SEARCH_A_CONTACTLESSON: 'Select or search a contact lesson',
                LIS_VOCATION_VIEW: 'Vocations',
                LIS_CREATE_NEW_VOCATION: 'Create new vocation',
                LIS_VOCATIONCODE: 'Vocation code',
                LIS_DURATIONEKAP: 'Duration (EKAP)',
                VOCATION_GRID_FILTERS: 'Vocation filters',
                SEARCH_A_NAME: 'Search by name',
                SEARCH_A_VOCATIONCODE: 'Search by vocation code',
                SEARCH_A_DURATIONEKAP: 'Search by duration (EKAP)',
                LIS_GRADECHOICE_VIEW: 'Grade choices',
                LIS_CREATE_NEW_GRADECHOICE: 'Create new grade choice',
                GRADECHOICE_GRID_FILTERS: 'Grade choice filter',
                LIS_MODULETYPE_VIEW: 'Module types',
                LIS_CREATE_NEW_MODULETYPE: 'Create new module type',
                MODULETYPE_GRID_FILTERS: 'Module type filter',
                LIS_STUDENT_VIEW: 'Students',
                LIS_CREATE_NEW_STUDENT: 'Create new student',
                SEARCH_A_FIRSTNAME: 'Search by first name',
                SEARCH_A_LASTNAME: 'Search by last name',
                SEARCH_AN_EMAIL: 'Search by e-mail address',
                SEARCH_A_PERSONALCODE: 'Search by code',
                STUDENT_GRID_FILTERS: 'Student filters',
                LIS_ADMINISTRATOR_VIEW: 'Administrators',
                LIS_CREATE_NEW_ADMINISTRATOR: 'Create new administrator',
                ADMINISTRATOR_GRID_FILTERS: 'Administrator filters',
                LIS_SUBJECT_VIEW: 'Curriculum subjects',
                LIS_CREATE_NEW_SUBJECT: 'Create new curriculum subject',
                SELECT_A_MODULE: 'Select a module',
                SELECT_GRADINGTYPES: 'Select grading types',
                LIS_SUBJECTCODE: 'Curriculum subject code',
                LIS_DURATIONALLAK: 'Duration all (AK)',
                LIS_DURATIONCONTACTAK: 'Contact lesson duration (AK)',
                LIS_DURATIONINDEPENDENTAK: 'Independent work duration (AK)',
                SUBJECT_GRID_FILTERS: 'Curriculum subject filters',
                SELECT_OR_SEARCH_A_MODULE: 'Select or search a module',
                SELECT_OR_SEARCH_GRADINGTYPES: 'Select or search grading types',
                SEARCH_A_SUBJECTCODE: 'Search by curriculum subject code',
                SEARCH_DURATIONALLAK: 'Search by duration all (AK)',
                SEARCH_DURATIONCONTACTAK: 'Search by contact lesson duration (AK)',
                SEARCH_DURATIONINDEPENDENTAK: 'Search by independent work duration (AK)',
//                Kristen
                LIS_DUEDATE: 'Due date',
                INDEPENDENDWORK_GRID_FILTERS: 'Filter',
                SELECT_OR_SEARCH_A_SUBJECTROUND: 'Select or search by subject round',
                SELECT_OR_SEARCH_A_TEACHER: 'Choose or search by a teacher',
                LIS_GRADINGTYPE_VIEW: 'Grading type',
                LIS_CREATE_NEW_GRADINGTYPE: 'Create new grading type',
                LIS_GRADINGTYPE_FILTERS: 'Grading type filters',
                LIS_SEARCH_NAME: 'Search by a name',
//               Teacher
                LIS_TEACHER_VIEW: "Teacher view",
                LIS_TEACHER_FILTER: "Teacher filter",
                LIS_TEACHER_CREATE: "Create new teacher",
                LIS_TEACHER_GRID_FILTERS: "Teacher grid filters",
//                MAIN MENU
                LIS_CURRICULUM: 'Others',
                LIS_VOCATION: 'Vocation',
                LIS_MODULE: 'Module',
                LIS_SUBJECT: 'Curriculum subject',
                LIS_MODULETYPE: 'Module type',
                LIS_GRADECHOICE: 'Grade choice',
                LIS_GRADINGTYPE: 'Grading type',
                LIS_ROOM: 'Rooms',
                LIS_DIARY: 'Diary',
                LIS_CONTACTLESSON: 'Contactlesson',
                LIS_ABSENCE: 'Absence',
                LIS_ABSENCEREASON: 'Absence reason',
                LIS_INDEPENDENTWORK: 'Independent work',
                LIS_STUDENTGRADE: 'Student grade',
                LIS_SUBJECTROUND: 'Subject round',
                LIS_TIMETABLE: 'Timetable',
                LIS_PERSONS: 'Persons',
                LIS_TEACHER: 'Teacher',
                LIS_STUDENT: 'Student',
                LIS_ADMINISTRATOR: 'Administrator',
                LIS_STUDENTGROUP: 'Studentgroup',
                LIS_STUDENTINGROUPS: 'Student in groups',
                LIS_ME: 'Me',
                LIS_CHANGE_MY_USER_DATA: 'Change my data',
                LIS_MY_DATA: 'My data',
                LIS_STUDENTGRADE_VIEW: 'Student grades',
                STUDENTGRADE_GRID_FILTERS: 'Student grade filters',
                SELECT_OR_SEARCH_A_GRADECHOICE: 'Select or search by grade choice',
                SELECT_OR_SEARCH_AN_INDEPENDENTWORK: 'Select or search by independent work',
                LIS_NOTES: 'Notes',
                STUDENTGROUP_GRID_FILTERS: 'Student group filters',
                SELECT_OR_SEARCH_A_VOCATION: 'Select or search by vocation',
                LIS_STUDENTINGROUPS_VIEW: 'Students in groups',
                LIS_CREATE_NEW_STUDENTINGROUPS: 'Create new student in groups',
                SELECT_A_STUDENTGROUP: 'Select a student group',
                STUDENTINGROUPS_GRID_FILTERS: 'Student in groups filters',
                LIS_STATUS: 'Status',
                SELECT_OR_SEARCH_A_STUDENTGROUP: 'Select or search by student group',
                LIS_CREATE_NEW_CONTACTLESSON: 'Create new contact lesson',
                LIS_CHOOSE_ROOM: 'Choose room',
                LIS_CHOOSE_SUBJECTROUND: 'Choose a subject round',
                LIS_CHOOSE_STUDENTGROUP: 'Choose student group',
                LIS_CHOOSE_MODULE: 'Choose module',
                LIS_CHOOSE_TEACHER: 'Choose teacher',
                LIS_DURATIONAK: 'Duration (AK)',
                LIS_SEQUENCENR: 'Lesson sequence number',
                LIS_LESSONDATE: 'Lesson date',
                LIS_DATE: 'Date',
                SELECT_OR_SEARCH_A_ROOM: 'Select or search by room',
                SEARCH_A_SEQUENCENR: 'Select or search by sequence number',
                SEARCH_A_LESSONDATE: 'Select or search by lesson date',
                LIS_CONTACTLESSONFILTER: 'Contact lesson filters',
                LIS_CHOOSE_MODULETYPE: 'Choose module type',
                LIS_MODULECODE: 'Code',
                LIS_DURATION: 'Duration',
                SEARCH_DURATION: 'Search by duration',
                LIS_MODULE_VIEW: 'Modules',
                LIS_CREATE_NEW_MODULE: 'Create new module',
                MODULE_GRID_FILTERS: 'Module filters',
                SEARCH_A_MODULECODE: 'Search by code',
                LIS_CREATE_NEW_INDEPENDENTWORK: 'Create new independent work',
                //timetable
                LIS_TEACHERABSENCEFILTER: 'Filter',
                SEARCH_A_STARTLESSONDATE: 'Start',
                SEARCH_A_ENDLESSONDATE: 'End',
                LIS_DIARYS:'Diary',
                LIS_DIARYVIEWFILTER:'Choose subject round and student group:',
                LIS_DIARY_VIEW:'Diary view',
                LIS_FILTER_REFRESH:'Filter',
                LIS_SUBJECTROUND_GRADE:'Subject round grade',
                LIS_PASSWORD_REQUIREMENTS:'Password must be at least 8 characters, no more than 20 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit. Password can not include accented characters and spaces.',
                LIS_CHECK_FORM_FIELDS:'Check form fields',
                LIS_YOU_CAN_LOGIN_NOW:'You can log in now',
                NOT_FOUND:'No student found with this data',
                LIS_LESSON_DESCRIPTION:'Lesson description',
                LIS_UPDATE_DESCRIPTION:'Update contact lesson description',
                LIS_NO_SUBJECTROUND_OR_CONTACTLESSONS_INSERTED:'No subject round or contact lessons inserted',
                SELF_CREATED_RESTRICTION:'You can only change data created by yourself',
                
                LIS_ERROR: 'Error!',
                LIS_HOME_WELCOME:'Main page',
                LIS_HOME_GREETING: 'Hello',
                LIS_PARAGRAPH_TEXT:'Welcome to the learning information system of German Technological School of Pärnu, where you can add grades, absences and independent works. In case of problems please contact with school administrator.'
            }
        };
        return t;
    });

}());


