import { startStimulusApp } from '@symfony/stimulus-bundle';

import { Message } from './message.js';

console.log ( Message("Hello Bootstrap") );


const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);