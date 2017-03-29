import AppConfig from './App.config';
/**
 * Creating mediator between AppConfig and app, shortcut to available params
 * @type {AppConfig}
 */
const appConfig = new AppConfig();
export const face = appConfig.config;


//export default _defaults;