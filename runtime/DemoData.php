<?php


namespace app\runtime;

/**
 * Class DemoData
 * @package app\runtime
 */
class DemoData
{
    public function users()
    {
        return [
            [
                'id' => 1,
                'name' => 'Phillip Rearick',
                'email' => 'psrearick@gmail.com',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'created' => "2021-01-10 07:00:00",
                'updated' => "2021-01-10 07:00:00"
            ],
            [
                'id' => 2,
                'name' => 'Timothy Sterling',
                'email' => 'sterlingt@gmail.com',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'created' => "2021-01-10 07:00:00",
                'updated' => "2021-01-10 07:00:00"
            ]
        ];
    }

    public function posts()
    {
        $blogContent1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed eros libero. Phasellus urna ante, scelerisque scelerisque velit et, lobortis feugiat augue. Mauris finibus ut neque a consequat. Fusce porttitor magna non turpis feugiat imperdiet. Nulla auctor ligula eget nulla convallis, ac congue nulla blandit. Aliquam convallis magna eget justo porta faucibus. Sed condimentum nulla urna, sit amet mattis odio ultrices in. Nam et quam ac leo ullamcorper condimentum. Morbi vulputate, lectus ac finibus condimentum, nulla purus lobortis lectus, eu porta turpis velit at magna. Nulla ac dui a nisi tincidunt porttitor in iaculis massa. Fusce sed commodo nunc, sit amet bibendum tellus. Suspendisse nisl turpis, volutpat ac neque nec, accumsan faucibus diam. Quisque vitae nibh tincidunt, vehicula elit vitae, fringilla justo.
Integer imperdiet augue sit amet nunc laoreet sodales. Duis ultrices augue quis laoreet pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi quis nunc vel sapien posuere finibus. Morbi vitae eros nec lorem vehicula pretium. Vivamus eleifend est vel est lacinia vulputate. Aenean sit amet hendrerit dolor, ut pulvinar dui. Nam luctus commodo arcu, et sollicitudin augue tempus ac. Aenean sem lorem, volutpat nec dapibus a, posuere at mi. Vestibulum condimentum fermentum tellus et imperdiet. Suspendisse felis nisi, interdum eu lectus et, dignissim imperdiet ipsum. In hac habitasse platea dictumst. Donec at metus auctor, lobortis erat laoreet, ultricies elit. Nulla blandit tortor non justo tincidunt, id cursus mauris semper. Praesent vehicula, lorem eget tincidunt viverra, lacus sapien mattis sapien, vel faucibus nisl turpis in quam. Proin sodales nisl vel egestas tincidunt.
Etiam tristique nisl ut neque aliquet ultrices. Sed blandit nulla at enim auctor, ac suscipit lectus tincidunt. Mauris eleifend laoreet diam, facilisis sollicitudin nunc. Sed ut erat consequat, condimentum nunc eget, aliquet arcu. Ut nec risus tristique, suscipit velit et, molestie felis. Aenean vel dapibus elit. Vestibulum ante felis, consequat ac lectus vitae, malesuada varius odio. Nam luctus, lacus molestie mattis sagittis, mi tellus pharetra tortor, et vehicula lectus ante non mauris. Duis lectus mi, faucibus id ligula nec, dictum euismod nisi. In mollis est diam, at blandit nunc pulvinar nec. Vivamus efficitur iaculis ante varius eleifend.
Donec vitae egestas elit. Curabitur pharetra luctus quam non ornare. Praesent ut risus metus. Nam ligula nibh, consectetur sit amet consectetur in, scelerisque vitae turpis. Pellentesque magna libero, consequat a augue sit amet, tincidunt consectetur arcu. Donec a malesuada sem. Aliquam ac augue vel ex efficitur gravida. Donec volutpat rhoncus quam, quis pharetra urna fringilla ac. Proin a mi iaculis dolor efficitur posuere. Vestibulum ultricies non nisl non porttitor. Sed bibendum mauris sit amet diam aliquam pretium. Curabitur finibus mauris non porttitor vehicula. Morbi viverra ligula vel tellus aliquet ultrices a id massa. Suspendisse potenti.
Vivamus vel nibh vulputate, viverra ex et, scelerisque lorem. Etiam lectus elit, rutrum in rhoncus in, scelerisque in ex. Nullam ut blandit neque. Vivamus lorem felis, vulputate a congue sit amet, rutrum in velit. In cursus massa in dolor tincidunt egestas. In mattis facilisis neque, at tristique lorem venenatis non. Quisque sapien arcu, ullamcorper sit amet consectetur et, faucibus vel mauris. Ut quam elit, accumsan eu egestas nec, viverra a purus. Proin sagittis, enim et finibus vulputate, dui turpis dignissim augue, eget vehicula est massa ullamcorper metus. Cras ullamcorper felis nec sapien euismod suscipit. Ut a feugiat ligula, at porta lacus. Quisque consectetur magna vel orci vehicula elementum. Nam consectetur ex luctus est ultrices faucibus. Duis tristique sagittis venenatis.
Nulla pretium rutrum euismod. Donec sodales pharetra blandit. Maecenas tempor iaculis felis, vel aliquam augue tempus id. Donec non ipsum ac lectus tempus blandit. In congue dolor nibh, id convallis sem semper non. Nullam lorem leo, consectetur id felis sit amet, aliquet pellentesque odio. Suspendisse potenti. Integer interdum massa in pellentesque volutpat. Sed quis varius dolor, eu feugiat diam. Maecenas imperdiet, mi quis ultricies tempor, nisl nisi varius elit, vel gravida magna lectus in leo. In malesuada commodo metus, eu fringilla ante sagittis vitae. Pellentesque ultrices elementum ligula in efficitur. Maecenas vitae ullamcorper sapien. Fusce et nunc quis tellus feugiat scelerisque. Sed condimentum posuere purus, sit amet molestie arcu gravida quis. Duis non ipsum fermentum, interdum libero in, aliquet diam.
Aenean et mollis arcu. Aliquam auctor cursus tempor. Quisque purus dolor, accumsan id laoreet eu, gravida sit amet sem. Aliquam efficitur purus tellus, sit amet facilisis neque efficitur in. Curabitur in lacinia lacus, eu ultricies libero. Nullam non diam erat. Pellentesque arcu elit, viverra mollis dictum a, lacinia sed elit. Praesent ornare lectus at sollicitudin imperdiet. Mauris ornare ex eget justo faucibus, a varius enim mattis. Proin a sapien condimentum, eleifend augue quis, elementum nulla. Ut sed rhoncus diam, a condimentum sem. Praesent facilisis nisl vulputate, aliquet nunc vitae, fermentum purus. Vivamus vel commodo est. Pellentesque commodo pellentesque nibh, id pretium purus porttitor et. Aenean laoreet nibh urna, in euismod lorem egestas id. Etiam dapibus ac odio et porta.
Integer rhoncus pharetra ullamcorper. Phasellus interdum mi quis ante aliquam commodo. Nam vitae interdum ex. Vestibulum dictum diam pulvinar semper rhoncus. Sed nec mi odio. Cras aliquam et est sed gravida. Fusce mollis ligula vitae metus laoreet hendrerit. Cras elementum ullamcorper imperdiet. Sed lobortis pulvinar interdum. Nullam pretium dui commodo lobortis ultricies.
Vivamus tincidunt sit amet tortor sit amet volutpat. Phasellus orci dolor, consequat vitae vulputate sit amet, efficitur fringilla sem. Nulla a tellus nec magna luctus pharetra sit amet non augue. Sed eu tellus elit. Nam viverra eleifend nulla blandit bibendum. Sed eget ultricies dui, vitae maximus nulla. Pellentesque porttitor nulla vitae pulvinar rhoncus. Aenean eu enim id metus viverra rutrum vel sit amet leo. Phasellus eu euismod sem. Sed imperdiet leo sem, eu faucibus lacus pellentesque non. Morbi a arcu velit. Nam non venenatis sapien, quis semper dui. Aenean a arcu augue. Cras volutpat mauris dolor, sed egestas magna volutpat at.
Duis at placerat eros. Fusce pulvinar hendrerit pharetra. Donec in eros sit amet ligula malesuada laoreet eu nec mi. Nulla malesuada lacus lobortis orci viverra cursus. Curabitur et bibendum eros. Cras sodales aliquet nulla a congue. Vestibulum dictum ante lectus, ut tincidunt lacus accumsan nec. Nunc gravida dignissim augue eget tempus. Etiam sed iaculis metus, nec mollis leo. Ut fringilla bibendum augue, at iaculis nisi pharetra sed. Proin consectetur viverra lectus, in ultrices odio dapibus non. Etiam porta blandit accumsan. Nulla facilisi. Ut nisl turpis, efficitur nec ligula vitae, laoreet rutrum leo. Nam quis porttitor nisi, a bibendum turpis.";

        $blogContent2 = "consectetur adipiscing elit. Curabitur sed eros libero. Phasellus urna ante, scelerisque scelerisque velit et, lobortis feugiat augue. Mauris finibus ut neque a consequat. Fusce porttitor magna non turpis feugiat imperdiet. Nulla auctor ligula eget nulla convallis, ac congue nulla blandit. Aliquam convallis magna eget justo porta faucibus. Sed condimentum nulla urna, sit amet mattis odio ultrices in. Nam et quam ac leo ullamcorper condimentum. Morbi vulputate, lectus ac finibus condimentum, nulla purus lobortis lectus, eu porta turpis velit at magna. Nulla ac dui a nisi tincidunt porttitor in iaculis massa. Fusce sed commodo nunc, sit amet bibendum tellus. Suspendisse nisl turpis, volutpat ac neque nec, accumsan faucibus diam. Quisque vitae nibh tincidunt, vehicula elit vitae, fringilla justo.
Nulla gravida efficitur egestas. Donec et mi odio. Aliquam erat volutpat. Suspendisse blandit nisi eu ex convallis, ac dignissim odio laoreet. Proin posuere varius eros ac pharetra. Pellentesque turpis quam, iaculis eget ex sit amet, faucibus tristique orci. Morbi aliquet magna eget leo vehicula, nec ultrices augue ultrices.
Etiam tristique nisl ut neque aliquet ultrices. Sed blandit nulla at enim auctor, ac suscipit lectus tincidunt. Mauris eleifend laoreet diam, facilisis sollicitudin nunc. Sed ut erat consequat, condimentum nunc eget, aliquet arcu. Ut nec risus tristique, suscipit velit et, molestie felis. Aenean vel dapibus elit. Vestibulum ante felis, consequat ac lectus vitae, malesuada varius odio. Nam luctus, lacus molestie mattis sagittis, mi tellus pharetra tortor, et vehicula lectus ante non mauris. Duis lectus mi, faucibus id ligula nec, dictum euismod nisi. In mollis est diam, at blandit nunc pulvinar nec. Vivamus efficitur iaculis ante varius eleifend.
Etiam euismod ullamcorper condimentum. Curabitur volutpat justo sed neque blandit, eget aliquet dui varius. Pellentesque commodo nulla ante, et vehicula neque eleifend nec. Pellentesque vitae efficitur mi. Vivamus congue sapien velit, molestie laoreet lorem interdum eu. In vel risus vitae nulla venenatis consectetur vel imperdiet leo. Curabitur tempor, magna ut euismod finibus, est tortor egestas libero, ac consequat nisi sem non arcu. Mauris feugiat felis ac erat maximus, eget venenatis est vehicula. Nullam convallis odio vitae lobortis varius. Curabitur tincidunt in eros at tempus. Morbi accumsan velit magna, non venenatis est pretium vel. Suspendisse potenti.
Vivamus vel nibh vulputate, viverra ex et, scelerisque lorem. Etiam lectus elit, rutrum in rhoncus in, scelerisque in ex. Nullam ut blandit neque. Vivamus lorem felis, vulputate a congue sit amet, rutrum in velit. In cursus massa in dolor tincidunt egestas. In mattis facilisis neque, at tristique lorem venenatis non. Quisque sapien arcu, ullamcorper sit amet consectetur et, faucibus vel mauris. Ut quam elit, accumsan eu egestas nec, viverra a purus. Proin sagittis, enim et finibus vulputate, dui turpis dignissim augue, eget vehicula est massa ullamcorper metus. Cras ullamcorper felis nec sapien euismod suscipit. Ut a feugiat ligula, at porta lacus. Quisque consectetur magna vel orci vehicula elementum. Nam consectetur ex luctus est ultrices faucibus. Duis tristique sagittis venenatis.
Phasellus facilisis tempus velit ac placerat. Sed lacinia sodales suscipit. Curabitur quis imperdiet mi. Proin tristique, arcu eu eleifend consequat, odio est iaculis nisi, sed semper ipsum felis in ipsum. Pellentesque pulvinar mauris sed gravida fermentum. Integer rhoncus libero in tellus pharetra aliquam. Sed lacinia neque ut malesuada interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et massa quam. Quisque lacinia pellentesque enim quis semper. Morbi et ipsum ac urna dictum fringilla et a sapien.
Aenean et mollis arcu. Aliquam auctor cursus tempor. Quisque purus dolor, accumsan id laoreet eu, gravida sit amet sem. Aliquam efficitur purus tellus, sit amet facilisis neque efficitur in. Curabitur in lacinia lacus, eu ultricies libero. Nullam non diam erat. Pellentesque arcu elit, viverra mollis dictum a, lacinia sed elit. Praesent ornare lectus at sollicitudin imperdiet. Mauris ornare ex eget justo faucibus, a varius enim mattis. Proin a sapien condimentum, eleifend augue quis, elementum nulla. Ut sed rhoncus diam, a condimentum sem. Praesent facilisis nisl vulputate, aliquet nunc vitae, fermentum purus. Vivamus vel commodo est. Pellentesque commodo pellentesque nibh, id pretium purus porttitor et. Aenean laoreet nibh urna, in euismod lorem egestas id. Etiam dapibus ac odio et porta.
In mauris tortor, maximus sed rutrum ac, condimentum ut libero. Curabitur eget diam at ipsum convallis vulputate rhoncus posuere libero. Praesent at eleifend dolor. Praesent scelerisque nunc vel purus interdum, ut sodales nisl convallis. Morbi quis aliquam nisi. Nunc vitae ultricies orci. Nulla non quam malesuada justo lobortis mollis faucibus vitae leo. Donec a leo ante. Nullam aliquam fringilla dictum. Fusce posuere facilisis ante, eget sollicitudin nulla pulvinar eget. Ut sit amet ipsum neque. Integer ligula augue, rhoncus et fermentum eget, hendrerit id eros. Integer suscipit, urna non fringilla pharetra, nisi magna sagittis tellus, sit amet feugiat mi lacus a est.
Vivamus tincidunt sit amet tortor sit amet volutpat. Phasellus orci dolor, consequat vitae vulputate sit amet, efficitur fringilla sem. Nulla a tellus nec magna luctus pharetra sit amet non augue. Sed eu tellus elit. Nam viverra eleifend nulla blandit bibendum. Sed eget ultricies dui, vitae maximus nulla. Pellentesque porttitor nulla vitae pulvinar rhoncus. Aenean eu enim id metus viverra rutrum vel sit amet leo. Phasellus eu euismod sem. Sed imperdiet leo sem, eu faucibus lacus pellentesque non. Morbi a arcu velit. Nam non venenatis sapien, quis semper dui. Aenean a arcu augue. Cras volutpat mauris dolor, sed egestas magna volutpat at.
Duis nisl mauris, commodo sed fermentum non, luctus sed justo. Vestibulum commodo libero purus, id euismod dui feugiat a. In hac habitasse platea dictumst. Nulla et sagittis justo. Ut congue orci ac convallis efficitur. Cras et nulla neque. Etiam ut orci sagittis, porttitor orci eget, molestie quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer sit amet facilisis elit. Cras porta dolor est, vitae ornare mauris ullamcorper a. Curabitur sed dui urna. Sed finibus sollicitudin arcu.";

        $blogContent3 = "Curabitur sed eros libero. Phasellus urna ante, scelerisque scelerisque velit et, lobortis feugiat augue. Mauris finibus ut neque a consequat. Fusce porttitor magna non turpis feugiat imperdiet. Nulla auctor ligula eget nulla convallis, ac congue nulla blandit. Aliquam convallis magna eget justo porta faucibus. Sed condimentum nulla urna, sit amet mattis odio ultrices in. Nam et quam ac leo ullamcorper condimentum. Morbi vulputate, lectus ac finibus condimentum, nulla purus lobortis lectus, eu porta turpis velit at magna. Nulla ac dui a nisi tincidunt porttitor in iaculis massa. Fusce sed commodo nunc, sit amet bibendum tellus. Suspendisse nisl turpis, volutpat ac neque nec, accumsan faucibus diam. Quisque vitae nibh tincidunt, vehicula elit vitae, fringilla justo.
Integer imperdiet augue sit amet nunc laoreet sodales. Duis ultrices augue quis laoreet pulvinar. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi quis nunc vel sapien posuere finibus. Morbi vitae eros nec lorem vehicula pretium. Vivamus eleifend est vel est lacinia vulputate. Aenean sit amet hendrerit dolor, ut pulvinar dui. Nam luctus commodo arcu, et sollicitudin augue tempus ac. Aenean sem lorem, volutpat nec dapibus a, posuere at mi. Vestibulum condimentum fermentum tellus et imperdiet. Suspendisse felis nisi, interdum eu lectus et, dignissim imperdiet ipsum. In hac habitasse platea dictumst. Donec at metus auctor, lobortis erat laoreet, ultricies elit. Nulla blandit tortor non justo tincidunt, id cursus mauris semper. Praesent vehicula, lorem eget tincidunt viverra, lacus sapien mattis sapien, vel faucibus nisl turpis in quam. Proin sodales nisl vel egestas tincidunt.
Nulla gravida efficitur egestas. Donec et mi odio. Aliquam erat volutpat. Suspendisse blandit nisi eu ex convallis, ac dignissim odio laoreet. Proin posuere varius eros ac pharetra. Pellentesque turpis quam, iaculis eget ex sit amet, faucibus tristique orci. Morbi aliquet magna eget leo vehicula, nec ultrices augue ultrices.
Etiam tristique nisl ut neque aliquet ultrices. Sed blandit nulla at enim auctor, ac suscipit lectus tincidunt. Mauris eleifend laoreet diam, facilisis sollicitudin nunc. Sed ut erat consequat, condimentum nunc eget, aliquet arcu. Ut nec risus tristique, suscipit velit et, molestie felis. Aenean vel dapibus elit. Vestibulum ante felis, consequat ac lectus vitae, malesuada varius odio. Nam luctus, lacus molestie mattis sagittis, mi tellus pharetra tortor, et vehicula lectus ante non mauris. Duis lectus mi, faucibus id ligula nec, dictum euismod nisi. In mollis est diam, at blandit nunc pulvinar nec. Vivamus efficitur iaculis ante varius eleifend.
Donec vitae egestas elit. Curabitur pharetra luctus quam non ornare. Praesent ut risus metus. Nam ligula nibh, consectetur sit amet consectetur in, scelerisque vitae turpis. Pellentesque magna libero, consequat a augue sit amet, tincidunt consectetur arcu. Donec a malesuada sem. Aliquam ac augue vel ex efficitur gravida. Donec volutpat rhoncus quam, quis pharetra urna fringilla ac. Proin a mi iaculis dolor efficitur posuere. Vestibulum ultricies non nisl non porttitor. Sed bibendum mauris sit amet diam aliquam pretium. Curabitur finibus mauris non porttitor vehicula. Morbi viverra ligula vel tellus aliquet ultrices a id massa. Suspendisse potenti.
Etiam euismod ullamcorper condimentum. Curabitur volutpat justo sed neque blandit, eget aliquet dui varius. Pellentesque commodo nulla ante, et vehicula neque eleifend nec. Pellentesque vitae efficitur mi. Vivamus congue sapien velit, molestie laoreet lorem interdum eu. In vel risus vitae nulla venenatis consectetur vel imperdiet leo. Curabitur tempor, magna ut euismod finibus, est tortor egestas libero, ac consequat nisi sem non arcu. Mauris feugiat felis ac erat maximus, eget venenatis est vehicula. Nullam convallis odio vitae lobortis varius. Curabitur tincidunt in eros at tempus. Morbi accumsan velit magna, non venenatis est pretium vel. Suspendisse potenti.
Vivamus vel nibh vulputate, viverra ex et, scelerisque lorem. Etiam lectus elit, rutrum in rhoncus in, scelerisque in ex. Nullam ut blandit neque. Vivamus lorem felis, vulputate a congue sit amet, rutrum in velit. In cursus massa in dolor tincidunt egestas. In mattis facilisis neque, at tristique lorem venenatis non. Quisque sapien arcu, ullamcorper sit amet consectetur et, faucibus vel mauris. Ut quam elit, accumsan eu egestas nec, viverra a purus. Proin sagittis, enim et finibus vulputate, dui turpis dignissim augue, eget vehicula est massa ullamcorper metus. Cras ullamcorper felis nec sapien euismod suscipit. Ut a feugiat ligula, at porta lacus. Quisque consectetur magna vel orci vehicula elementum. Nam consectetur ex luctus est ultrices faucibus. Duis tristique sagittis venenatis.
Nulla pretium rutrum euismod. Donec sodales pharetra blandit. Maecenas tempor iaculis felis, vel aliquam augue tempus id. Donec non ipsum ac lectus tempus blandit. In congue dolor nibh, id convallis sem semper non. Nullam lorem leo, consectetur id felis sit amet, aliquet pellentesque odio. Suspendisse potenti. Integer interdum massa in pellentesque volutpat. Sed quis varius dolor, eu feugiat diam. Maecenas imperdiet, mi quis ultricies tempor, nisl nisi varius elit, vel gravida magna lectus in leo. In malesuada commodo metus, eu fringilla ante sagittis vitae. Pellentesque ultrices elementum ligula in efficitur. Maecenas vitae ullamcorper sapien. Fusce et nunc quis tellus feugiat scelerisque. Sed condimentum posuere purus, sit amet molestie arcu gravida quis. Duis non ipsum fermentum, interdum libero in, aliquet diam.
Phasellus facilisis tempus velit ac placerat. Sed lacinia sodales suscipit. Curabitur quis imperdiet mi. Proin tristique, arcu eu eleifend consequat, odio est iaculis nisi, sed semper ipsum felis in ipsum. Pellentesque pulvinar mauris sed gravida fermentum. Integer rhoncus libero in tellus pharetra aliquam. Sed lacinia neque ut malesuada interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et massa quam. Quisque lacinia pellentesque enim quis semper. Morbi et ipsum ac urna dictum fringilla et a sapien.
Aenean et mollis arcu. Aliquam auctor cursus tempor. Quisque purus dolor, accumsan id laoreet eu, gravida sit amet sem. Aliquam efficitur purus tellus, sit amet facilisis neque efficitur in. Curabitur in lacinia lacus, eu ultricies libero. Nullam non diam erat. Pellentesque arcu elit, viverra mollis dictum a, lacinia sed elit. Praesent ornare lectus at sollicitudin imperdiet. Mauris ornare ex eget justo faucibus, a varius enim mattis. Proin a sapien condimentum, eleifend augue quis, elementum nulla. Ut sed rhoncus diam, a condimentum sem. Praesent facilisis nisl vulputate, aliquet nunc vitae, fermentum purus. Vivamus vel commodo est. Pellentesque commodo pellentesque nibh, id pretium purus porttitor et. Aenean laoreet nibh urna, in euismod lorem egestas id. Etiam dapibus ac odio et porta.
Integer rhoncus pharetra ullamcorper. Phasellus interdum mi quis ante aliquam commodo. Nam vitae interdum ex. Vestibulum dictum diam pulvinar semper rhoncus. Sed nec mi odio. Cras aliquam et est sed gravida. Fusce mollis ligula vitae metus laoreet hendrerit. Cras elementum ullamcorper imperdiet. Sed lobortis pulvinar interdum. Nullam pretium dui commodo lobortis ultricies.
In mauris tortor, maximus sed rutrum ac, condimentum ut libero. Curabitur eget diam at ipsum convallis vulputate rhoncus posuere libero. Praesent at eleifend dolor. Praesent scelerisque nunc vel purus interdum, ut sodales nisl convallis. Morbi quis aliquam nisi. Nunc vitae ultricies orci. Nulla non quam malesuada justo lobortis mollis faucibus vitae leo. Donec a leo ante. Nullam aliquam fringilla dictum. Fusce posuere facilisis ante, eget sollicitudin nulla pulvinar eget. Ut sit amet ipsum neque. Integer ligula augue, rhoncus et fermentum eget, hendrerit id eros. Integer suscipit, urna non fringilla pharetra, nisi magna sagittis tellus, sit amet feugiat mi lacus a est.
Vivamus tincidunt sit amet tortor sit amet volutpat. Phasellus orci dolor, consequat vitae vulputate sit amet, efficitur fringilla sem. Nulla a tellus nec magna luctus pharetra sit amet non augue. Sed eu tellus elit. Nam viverra eleifend nulla blandit bibendum. Sed eget ultricies dui, vitae maximus nulla. Pellentesque porttitor nulla vitae pulvinar rhoncus. Aenean eu enim id metus viverra rutrum vel sit amet leo. Phasellus eu euismod sem. Sed imperdiet leo sem, eu faucibus lacus pellentesque non. Morbi a arcu velit. Nam non venenatis sapien, quis semper dui. Aenean a arcu augue. Cras volutpat mauris dolor, sed egestas magna volutpat at.
Duis at placerat eros. Fusce pulvinar hendrerit pharetra. Donec in eros sit amet ligula malesuada laoreet eu nec mi. Nulla malesuada lacus lobortis orci viverra cursus. Curabitur et bibendum eros. Cras sodales aliquet nulla a congue. Vestibulum dictum ante lectus, ut tincidunt lacus accumsan nec. Nunc gravida dignissim augue eget tempus. Etiam sed iaculis metus, nec mollis leo. Ut fringilla bibendum augue, at iaculis nisi pharetra sed. Proin consectetur viverra lectus, in ultrices odio dapibus non. Etiam porta blandit accumsan. Nulla facilisi. Ut nisl turpis, efficitur nec ligula vitae, laoreet rutrum leo. Nam quis porttitor nisi, a bibendum turpis.
Duis nisl mauris, commodo sed fermentum non, luctus sed justo. Vestibulum commodo libero purus, id euismod dui feugiat a. In hac habitasse platea dictumst. Nulla et sagittis justo. Ut congue orci ac convallis efficitur. Cras et nulla neque. Etiam ut orci sagittis, porttitor orci eget, molestie quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer sit amet facilisis elit. Cras porta dolor est, vitae ornare mauris ullamcorper a. Curabitur sed dui urna. Sed finibus sollicitudin arcu.";
        return [
            [
                'id' => 1,
                'post_title' => 'consectetur adipiscing elit Curabitur sed',
                'body' => $blogContent1,
                'tags' => [1, 2, 3, 4],
                'image_url' => 'https://via.placeholder.com/1200x350.png/B2EBF2',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed eros libero.',
                'category_id' => 1,
                'user_id' => 1,
                'slug' => 'consectetur-adipiscing-elit-curabitur-sed'
            ],
            [
                'id' => 2,
                'post_title' => 'Duis ultrices augue quis laoreet',
                'body' => $blogContent2,
                'tags' => [1, 3],
                'image_url' => 'https://via.placeholder.com/1200x350.png/9FA8DA',
                'excerpt' => 'Curabitur quis imperdiet mi. Proin tristique, arcu eu eleifend consequat, odio est',
                'category_id' => 2,
                'user_id' => 1,
                'slug' => 'duis-ultrices-augue-quis-laoreet'
            ],
            [
                'id' => 3,
                'post_title' => 'Aliquam erat volutpat',
                'body' => $blogContent3,
                'tags' => [2, 4],
                'image_url' => 'https://via.placeholder.com/1200x350.png/DAF7A6',
                'excerpt' => 'Phasellus facilisis tempus velit ac placerat. Sed lacinia sodales suscipit.',
                'category_id' => 3,
                'user_id' => 1,
                'slug' => 'aliquam-erat-volutpat'
            ],
            [
                'id' => 4,
                'post_title' => 'Aenean et mollis arcu',
                'body' => $blogContent1,
                'tags' => [1, 2, 3],
                'image_url' => 'https://via.placeholder.com/1200x350.png/B2EBF2',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed eros libero.',
                'category_id' => 1,
                'user_id' => 1,
                'slug' => 'aenean-et-mollis-arcu'
            ],
            [
                'id' => 5,
                'post_title' => 'Praesent ut risus metus, Nam ligula nibh',
                'body' => $blogContent2,
                'tags' => [2, 3, 4],
                'image_url' => 'https://via.placeholder.com/1200x350.png/9FA8DA',
                'excerpt' => 'Curabitur quis imperdiet mi. Proin tristique, arcu eu eleifend consequat, odio est',
                'category_id' => 2,
                'user_id' => 2,
                'slug' => 'praesent-ut-risus-metus-nam-ligula-nibh'
            ],
            [
                'id' => 6,
                'post_title' => 'Vestibulum commodo libero purus',
                'body' => $blogContent3,
                'tags' => [2, 3],
                'image_url' => 'https://via.placeholder.com/1200x350.png/DAF7A6',
                'excerpt' => 'Phasellus facilisis tempus velit ac placerat. Sed lacinia sodales suscipit.',
                'category_id' => 3,
                'user_id' => 2,
                'slug' => 'vestibulum-commodo-libero-purus'
            ],
            [
                'id' => 7,
                'post_title' => 'Donec sodales pharetra blandit',
                'body' => $blogContent1,
                'tags' => [1, 4],
                'image_url' => 'https://via.placeholder.com/1200x350.png/B2EBF2',
                'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed eros libero.',
                'category_id' => 1,
                'user_id' => 2,
                'slug' => 'donec-sodales-pharetra-blandit'
            ],
            [
                'id' => 8,
                'post_title' => 'Curabitur pharetra luctus quam non ornare',
                'body' => $blogContent2,
                'tags' => [1, 2],
                'image_url' => 'https://via.placeholder.com/1200x350.png/9FA8DA',
                'excerpt' => 'Curabitur quis imperdiet mi. Proin tristique, arcu eu eleifend consequat, odio est',
                'category_id' => 2,
                'user_id' => 2,
                'slug' => 'curabitur-pharetra-luctus-quam-non-ornare'
            ],
            [
                'id' => 9,
                'post_title' => 'Nulla et sagittis justo',
                'body' => $blogContent3,
                'tags' => [2, 4],
                'image_url' => 'https://via.placeholder.com/1200x350.png/DAF7A6',
                'excerpt' => 'Phasellus facilisis tempus velit ac placerat. Sed lacinia sodales suscipit.',
                'category_id' => 3,
                'user_id' => 2,
                'slug' => 'nulla-et-sagittis-justo'
            ],
        ];
    }

    final public function category()
    {
        return [
            [
                'id' => 1,
                'category' => 'imperdiet'
            ],
            [
                'id' => 2,
                'category' => 'sagittis'
            ],
            [
                'id' => 3,
                'category' => 'commodo'
            ],

        ];
    }

    final public function tags()
    {
        return [
            [
                'id' => 1,
                'tagName' => 'commodo'
            ],
            [
                'id' => 2,
                'tagName' => 'non'
            ],
            [
                'id' => 3,
                'tagName' => 'sed'
            ],
            [
                'id' => 4,
                'tagName' => 'fermentum'
            ]
        ];
    }
}
