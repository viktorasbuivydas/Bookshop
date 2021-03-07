import axios from 'axios'

class User{
    isLoggedIn(){
        return localStorage.getItem('token');
    }
}
export default new User();
