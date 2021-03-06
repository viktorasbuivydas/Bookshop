import axios from 'axios';

class BookService{
    index(){
        return axios.get('link');
    }
    show(id){
        return axios.get('link', id);
    }
    update(id, data){
        return axios.get('link'+ id, data);
    }
    destroy(id){
        return axios.delete('link' + id);
    }
}
export default new BookService();
