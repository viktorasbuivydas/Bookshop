import axios from 'axios';

class BookService{
    index(page){
        return axios.get('api/v1/books?page=' + page);
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
