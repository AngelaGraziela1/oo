<?php
/**
 * This file is part of oo.
 * Copyright (c) Lellys Informática. All rights reserved. See License.txt in the project root for license information.
 *
 * Author: italolelis
 * Date: 8/31/13
 */

namespace Observer;

use Event\EventInterface;

interface ObserverInterface
{

    public function attach(SubscriberInterface $subscriber, $event);

    public function detach(SubscriberInterface $subscriber);

    public function notify(EventInterface $event);

}