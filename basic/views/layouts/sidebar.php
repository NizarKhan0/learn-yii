    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3>General</h3>
            <?=
            \yiister\gentelella\widgets\Menu::widget(
                [
                    "items" => [
                        ["label" => "Home", "url" => "site/index", "icon" => "home"],
                        ["label" => "Personal", "url" => ["personal/index"], "icon" => "fas fa-user"],
                        // ["label" => "Staff", "url" => ["staff/index"], "icon" => "fas fa-users"],
                        [
                            "label" => "Staff",
                            "icon" => "fas fa-users",
                            "url" => "#",
                            "items" => [
                                ["label" => "Staff List", "url" => ["staff/index"]],
                            ],
                        ]
                        // [
                        //     "label" => "Badges",
                        //     "url" => "#",
                        //     "icon" => "table",
                        //     "items" => [
                        //         [
                        //             "label" => "Default",
                        //             "url" => "#",
                        //             "badge" => "123",
                        //         ],
                        //         [
                        //             "label" => "Success",
                        //             "url" => "#",
                        //             "badge" => "new",
                        //             "badgeOptions" => ["class" => "label-success"],
                        //         ],
                        //         [
                        //             "label" => "Danger",
                        //             "url" => "#",
                        //             "badge" => "!",
                        //             "badgeOptions" => ["class" => "label-danger"],
                        //         ],
                        //     ],
                        // ],
                        // [
                        //     "label" => "Multilevel",
                        //     "url" => "#",
                        //     "icon" => "table",
                        //     "items" => [
                        //         [
                        //             "label" => "Second level 1",
                        //             "url" => "#",
                        //         ],
                        //         [
                        //             "label" => "Second level 2",
                        //             "url" => "#",
                        //             "items" => [
                        //                 [
                        //                     "label" => "Third level 1",
                        //                     "url" => "#",
                        //                 ],
                        //                 [
                        //                     "label" => "Third level 2",
                        //                     "url" => "#",
                        //                 ],
                        //             ],
                        //         ],
                        //     ],
                        // ],
                    ],
                ]
            )
            ?>
        </div>
    </div>