<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerETHqO0H\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerETHqO0H/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerETHqO0H.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerETHqO0H\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerETHqO0H\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'ETHqO0H',
    'container.build_id' => 'a76b3dc2',
    'container.build_time' => 1515665033,
));
