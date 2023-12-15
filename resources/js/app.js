import './bootstrap';
import '../css/app.css'
import 'flowbite';

import Alpine from 'alpinejs'
import Clipboard from '@ryangjchandler/alpine-clipboard'

Alpine.plugin(Clipboard)
Alpine.start()
