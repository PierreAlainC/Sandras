# Commandes Fixtures

[Formatters Faker]([Adresse](http://fakerphp.org/formatters/))  

## Installation

```bash
composer require fakerphp/faker
```

Si c'est impossible de l'installer, vérifier que le Faker n'entre pas en ... avec un autre composant ou avec sa version.  
Du coup si besoin :

```bash
composer remove composantEnQuestion
```

## Toutes les commandes

``bash
Faker\Provider\en_US\Person#
title($gender = null|'male'|'female')     // 'Ms.'
titleMale()                               // 'Mr.'
titleFemale()                             // 'Ms.'
suffix()                                  // 'Jr.'
name($gender = null|'male'|'female')      // 'Dr. Zane Stroman'
firstName($gender = null|'male'|'female') // 'Maynard'
firstNameMale()                           // 'Maynard'
firstNameFemale()                         // 'Rachel'
lastName()                                // 'Zulauf'  

Faker\Provider\en_US\Address#
cityPrefix()                       // 'Lake'
secondaryAddress()                 // 'Suite 961'
state()                            // 'NewMexico'
stateAbbr()                        // 'OH'
citySuffix()                       // 'borough'
streetSuffix()                     // 'Keys'
buildingNumber()                   // '484'
city()                             // 'West Judge'
streetName()                       // 'Keegan Trail'
streetAddress()                    // '439 Karley Loaf Suite 897'
postcode()                         // '17916'
address()                          // '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'
country()                          // 'Falkland Islands (Malvinas)'
latitude($min = -90, $max = 90)    // 77.147489
longitude($min = -180, $max = 180) // 86.211205  

Faker\Provider\en_US\PhoneNumber#
phoneNumber()              // '827-986-5852'
phoneNumberWithExtension() // '201-886-0269 x3767'
tollFreePhoneNumber()      // '(888) 937-7238'
e164PhoneNumber()          // '+27113456789'  

Faker\Provider\en_US\Company#
catchPhrase()   // 'Monitored regional contingency'
bs()            // 'e-enable robust architectures'
company()       // 'Bogan-Treutel'
companySuffix() // 'and Sons'
jobTitle()      // 'Cashier'  

Faker\Provider\en_US\Text#
realText($maxNbChars = 200, $indexSize = 2)
// "And yet I wish you could manage it?) 'And what are they made of?' Alice asked in a shrill, passionate voice. 'Would YOU like cats if you were never even spoke to Time!' 'Perhaps not,' Alice replied."
realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2)
// "VERY short remarks, and she ran across the garden, and I had not long to doubt, for the end of the bottle was NOT marked 'poison,' it is right?' 'In my youth,' Father William replied to his ear."
```
