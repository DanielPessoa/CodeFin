import LoginComponent from './components/Login.vue';
import LogoutComponent from './components/Logout.vue';
import DashBoardComponent from './components/Dashboard.vue';
import BankAccountListComponent from './components/bank-account/BankAccountList.vue';


export default {
    '/login': {
        name: 'auth.login',
        component: LoginComponent,
        auth: false
    },
    '/logout':{
        name: 'auth.logout',
        component: LogoutComponent,
        auth: true
    },
    '/dashboard': {
        name: 'dashboard',
        component: DashBoardComponent,
        auth: true
    },
    '/bank-accounts': {
        component: {template: "<router-view></router-view>"},
        subRoutes: {
            '/': {
                name: 'bank-account.list',
                component: BankAccountListComponent
            },
            '/:id/update':{
                name:'bank-account.update',
                component: BankAccountListComponent
            }
        }
    },

}