import axios from 'axios'

class Home{
    index(){
        return axios.get('api/v1/user/home');
    }
}
export default new Home();
