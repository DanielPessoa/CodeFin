import config from '../config';

const LOCATION = window.location;

let localConfig = {
    host: `${LOCATION.protocol}//${LOCATION.hostname}:${LOCATION.port}`,
    get login_url(){
        return `${this.host}${config.app_path}${config.login_path}`;
    }
};

const appConfig = Object.assign({},config, localConfig);

export default appConfig;