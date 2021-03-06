<?php

return [
    'generics' => [
        'if you have trouble' =>    'If you’re having trouble clicking buttons, copy and paste the link below into your web browser:|
                                    If you’re having trouble clicking buttons, copy and paste the links below into your web browser',
        'payment notification' => 'Payment Notification'
    ],
    'visitor-query' => [
        'subject' => 'Requested made by :name',
        'title' => 'New visitor request',
        'body' =>   "
                    <p>
                         A new visitor has asked for an issue. Here are the query details:
                    </p>
                    "
    ],
    'payment-reminder' => [
        '2 days' => [
            'subject' => 'The Application for your :program Program is still pending',
            'body' =>   "
                        <p>
                            Hi :name, you have recently joined IntuuChina to apply for our :program Program, however, we remind you
                            that in order to proceed with the process is strictly necessary to make the corresponding payment.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
            'closing' =>    "
                            <p>
                               " . trans('content.are you in doubt') . "
                            </p>
                            "
        ],
        '1 week' => [
            'subject' => 'The Application for your :program Program is still pending',
            'body' =>   "
                        <p>
                            Hi :name, last week you joined IntuuChina to apply for our :program Program. We want to let you know that
                            in order to proceed with the process of your selected program you must make the corresponding payment for it.
                        </p>
                        <p>
                            This would help out during the incipient stage of the management of your chosen program.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
            'closing' =>    "
                            <p>
                                 " . trans('content.are you in doubt') . "
                            </p>
                            "
        ],
        '2 weeks' => [
            'subject' => 'The Application for your :program Program is still pending',
            'body' =>   "
                        <p>
                            Hi :name, we have noticed you haven't carry out the corresponding payment for your application in
                            our :program Program.
                        <p>
                            Due to the incipient management costs this application entails it is mandatory to have made this transaction
                            prior to the starting of the process.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
        ],
        '1 month' => [
            'subject' => 'The Application for your :program Program is still pending',
            'body' =>   "
                        <p>
                            Hi :name, we have noticed you haven't carry out the corresponding payment for your application in
                            our :program Program.
                        <p>
                            Due to the incipient management costs this application entails it is mandatory to have made this transaction
                            prior to the starting of the process.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
        ],
        '3 months' => [
            'subject' => 'The Application for your :program Program is still pending',
            'body' =>   "
                        <p>
                            Hi :name, we have noticed you haven't carry out the corresponding payment for your application in
                            our :program Program.
                        <p>
                            Due to the incipient management costs this application entails it is mandatory to have made this transaction
                            prior to the starting of the process.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
        ],
        '1 year' => [
            'subject' => 'Are you still interested in your :program Program?',
            'body' =>   "
                        <p>
                            Hi :name, we have noticed you have been holding a pending application for a long time.
                            If you are no longer interested in your application, please report us at <a href='mailto:" .config('mail.to.address'). "'>" .config('mail.from.address'). "</a> 
                            and we will stop sending you more emails.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
        ],
        '2 years' => [
            'subject' => 'Are you still interested in your :program Program?',
            'body' =>   "
                        <p>
                            Hi :name, we have noticed you have been holding a pending application for a long time.
                            If you are no longer interested in your application, please report us at <a href='mailto:" .config('mail.to.address'). "'>" .config('mail.from.address'). "</a> 
                            and we will stop sending you more emails.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
        ],
        '3 years' => [
            'subject' => 'Are you still interested in your :program Program?',
            'body' =>   "
                        <p>
                            Hi :name, we have noticed you have been holding a pending application for a long time.
                            If you are no longer interested in your application, please report us at <a href='mailto:" .config('mail.to.address'). "'>" .config('mail.from.address'). "</a> 
                            and we will stop sending you more emails.
                        </p>
                        <p>
                            This is your fee according to the selected program:
                            <ul>
                                <li>:fee: :amount</li>
                            </ul>
                        </p>
                        ",
        ],
        'action' => [
            0 => 'Pay Now'
        ]
    ],
    'new-user' => [
        'subject' => 'Welcome :name to our :program Program',
        'title' => 'Welcome to IntuuChina',
        'body' => [
            'internship' => [
                'greeting' =>   "
                                <p>
                                    Dear :name,
                                </p>
                                ",
                'message' =>    "
                                <p>
                                    We are glad you are interested in our Internship Program. My name is Patrick and my job is to advise and guide you throughout our selection process, hopefully, I will get to meet you in China soon! Please note the first step will be for you to send me your CV to this e-mail for our first career counseling videoconference:
                                </p>
                                <p>
                                    In our first Career Counselling call we will be covering the following:
                                </p>
                                <ol>
                                    <li><b>Sector you'd like to work in</b></li>
                                    <li><b>Kinds of companies you'd like</b></li>
                                    <li><b>Interview preparation</b></li>
                                    <li><b>CV review and recommendations</b></li>
                                    <li><b>Strengths and weaknesses</b></li>
                                    <li><b>Spoken languages</b></li>
                                    <li><b>Your questions and our recommendations for China</li>
                                </ol>
                                " .
                                "
                                <p>
                                    We get 500 people per month asking for our services and in order to ensure we only proceed with those that are really committed we request an application fee of <b>" . numfmt_format_currency(numfmt_create(Config::get('app.locale'), \NumberFormatter::CURRENCY), number_format(App\Program::where('value', 'internship')->first()->feeType->fees()->first()->amount, 2), Config::get('services.stripe.cashier_currency')) . "</b>.
                                    However, we need you to confirm this is the email you use to register in our website. We provide you both links so that
                                    you can proceed with the payment in case you want to do so. Please, remember we cannot keep the process until
                                    we effectively receive the payment requested.
                                </p> 
                                ",
                'closing' =>    "
                                <p>
                                    Once that is done we will proceed with the call and discuss the matters aforementioned.
                                    Do not hesitate please if you have any doubts, comments, or quibbles. We are here to be helpful and keep improving our service.
                                </p>
                                ",
                'farewell' =>   "
                                <p>
                                    Kindest regards, <br/>Patrick  
                                </p>
                                ",
            ],


            'inter_relocat' => [
                'greeting' =>   "
                                <p>
                                    Dear :name,
                                </p>
                                ",
                'message' =>    "
                                <p>
                                    We are glad you are interested in our Internship Program. My name is Patrick and my job is to advise and guide you throughout our selection process, hopefully, I will get to meet you in China soon! Please note the first step will be for you to send me your CV to this e-mail for our first career counseling videoconference:
                                </p>
                                <p>
                                    In our first Career Counselling call we will be covering the following:
                                </p>
                                <ol>
                                    <li><b>Sector you'd like to work in</b></li>
                                    <li><b>Kinds of companies you'd like</b></li>
                                    <li><b>Interview preparation</b></li>
                                    <li><b>CV review and recommendations</b></li>
                                    <li><b>Strengths and weaknesses</b></li>
                                    <li><b>Spoken languages</b></li>
                                    <li><b>Your questions and our recommendations for China</li>
                                </ol>
                                " .
                                "
                                <p>
                                    We get 500 people per month asking for our services and in order to ensure we only proceed with those that are really committed we request an application fee of <b>" . numfmt_format_currency(numfmt_create(Config::get('app.locale'), \NumberFormatter::CURRENCY), number_format(App\Program::where('value', 'inter_relocat')->first()->feeType->fees()->first()->amount, 2), Config::get('services.stripe.cashier_currency')) . "</b>.
                                    However, we need you to confirm this is the email you use to register in our website. We provide you both links so that
                                    you can proceed with the payment in case you want to do so. Please, remember we cannot keep the process until
                                    we effectively receive the payment requested.
                                </p> 
                                ",
                'closing' =>    "
                                <p>
                                    Once that is done we will proceed with the call and discuss the matters aforementioned.
                                    Do not hesitate please if you have any doubts, comments, or quibbles. We are here to be helpful and keep improving our service.
                                </p>
                                ",
                'farewell' =>   "
                                <p>
                                    Kindest regards, <br/>Patrick  
                                </p>
                                ",
            ],


            'study' => [
                'greeting' =>   "
                                <p>
                                    Dear :name,
                                </p>
                                ",
                'message' =>    "
                                <p>
                                    We are glad you are interested in our Chinese Study Program. My name is Patrick and my job is to advise and guide you throughout the process, hopefully, I will get to meet you in China soon! Please note that the pricing for classes are the following:
                                </p>
                                <ol>
                                    <li>
                                        <b>Individual Online Courses for a minimun of 40 hours by videoconference: (Exc. Taxes) " . numfmt_format_currency(numfmt_create(Config::get('app.locale'), \NumberFormatter::CURRENCY), number_format(App\Category::where('value', 'online')->first()->fee->amount, 2), Config::get('services.stripe.cashier_currency')) . " </b>
                                    </li>
                                    <li>
                                        <b>Local Chinese group classes in Shanghai for 100 hours: (Incl. Visa and Exc. Taxes) " .  numfmt_format_currency(numfmt_create(Config::get('app.locale'), \NumberFormatter::CURRENCY), number_format(App\Category::where('value', 'in-person')->first()->fee->amount, 2), Config::get('services.stripe.cashier_currency')) . "</b>
                                    </li>
                                </ol>
                                <p>
                                    Firstly, we need you to confirm this is the email which you used to register in our website.
                                    You can either verify the email and proceed with the course payment in case you want to do both.
                                    Do not hesitate please if you have any doubts, comments, or quibbles. We are here to be helpful and keep improving our service.
                                </p>
                                ",
                'closing' =>    "
                                <p>
                                    Once that is done I will confirm this step by e-mail and start working with you on finding dates and teachers!
                                </p>
                                ",
                'farewell' =>    "
                                <p>
                                    All the best, <br/>Patrick
                                </p>
                                ",
            ],


            'university' => [
                'greeting' =>   "
                                <p>
                                    Dear :name,
                                </p>
                                ",
                'message' =>    "
                                <p>
                                    My name is Patrick and I just saw you applied through our website. Please note I will be your college counselor and will help you throughout the application process.
                                </p>
                                <p>
                                    We have worked with some of the most prestigious Business Schools in China for MBA and Masters in International Business because we select the candidates for our programs very carefully. We have not only had a 100% success rate in these institutions but we have also managed to get scholarships for many of our applicants. As a next step I would need the following:
                                </p>
                                <ol>
                                    <li>
                                        <b>Discuss studies you are looking for</b>
                                    </li>
                                        <li>
                                            <b>Potential universities you want</b>
                                        </li>
                                        <li>
                                            <b>Your need for funding</b>
                                        </li>
                                        <li>
                                            <b>Cover any questions you might have</b>
                                        </li>
                                </ol>
                                <p>
                                    We get 500 people per month asking for our services and in order to ensure we only proceed with those that are really committed we request an application fee of <b>" . numfmt_format_currency(numfmt_create(Config::get('app.locale'), \NumberFormatter::CURRENCY), number_format(App\Program::where('value', 'university')->first()->feeType->fees()->first()->amount, 2), Config::get('services.stripe.cashier_currency')) . "</b>.
                                    We provide you both links so that you can proceed with the payment in case you want to do so. Please, remember we cannot keep the process until we effectively receive the payment requested.
                                </p>
                                ",
                'closing' =>    "
                                <p>
                                    Once that payment is done, I will get in touch to schedule the next step. 
                                    Do not hesitate please if you have any doubts, comments, or quibbles. We are here to be helpful and keep improving our service.
                                </p>
                                ",
                'farewell' =>    "
                                <p>
                                    Kindest regards, <br/>Patrick
                                </p>
                                ",
            ],
        ],
        'action' => [
            0 => 'Confirm Only',
            1 => 'Confirm and Pay'
        ]
    ],
    'new-payment' => [
        'title' => 'New user payment',
        'subject' => ':user has made a payment for his :program Program',
        'body' => [
            'chinese_in-person_course' =>   "{1}
                                            <p>
                                                :user has recently made a payment of :amount for a :duration month staying in China.
                                            </p>
                                            |[2,*]
                                            <p>
                                                :user has recently made a payment of :amount for a :duration months staying in China.
                                            </p>
                                            ",
            'chinese_online_course' => "{1}
                                        <p>
                                            :user has recently made a payment of :amount to get 
                                            :duration hour of chinese online class. 
                                        </p>
                                        |[2, *]
                                        <p>
                                            :user has recently made a payment of :amount to get 
                                            :duration hours of chinese online classes.
                                        </p>
                                        ",
            'application_fee' =>    "
                                    <p>
                                        :user has recently made the corresponding application fee
                                        of :amount for his :program Program . You should contact him as soon as possible
                                        to go on with the application process.
                                    </p>
                                    ",
        ],
    ],
    'invoice' => [
        'paid' => [
            'title' => 'User Invoice Paid',
            'subject' => 'Payment confirmation for ' . config('app.name'),
            'body' =>   [
                'chinese_in-person_course' =>   "
                                                <p>
                                                    Your payment has been successfully done. Thank you, for letting
                                                    us to lend you hand in your way to learn the most spoken 
                                                    language in the world.
                                                </p>
                                                ",
                'chinese_online_course' =>  "
                                            <p>
                                                Your payment has been successfully done. Thank you, for letting
                                                us to lend you hand in your way to learn the most spoken 
                                                language in the world.
                                            </p>
                                            ",

                'application_fee' =>    "
                                        <p>
                                            Your payment has been successfully done. We just 
                                            want to thank you so much for trust us in your way
                                            to China.
                                        </p>
                                        
                                        <p>
                                             Throughout today or no later than tomorrow will be calling you to reach
                                             out to you as to let you know if you finally has been selected in our 
                                             :program. In the event you have not been accepted, you will be refunded
                                             with the whole amount of money you made the payment.
                                        </p>
                                        ",
            ],
            'action' => [
                0 => 'See Your Invoice'
            ]
        ]
    ],
    'admin' => [
        'new-user' => [
            'subject' => 'A new form submission has been received',
            'title' => 'User Details',
            'card' => [
                'body' =>   "
                            <p>
                               The following data has been sent from the submission form:
                            </p>
                            "
            ],
            'body' =>   "
                        <p>
                            A new user has addressed to IntuuChina to apply for the :program program
                        </p>
                        "
        ]
    ],
];
