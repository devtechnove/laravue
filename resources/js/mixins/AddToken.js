export default {
    mounted() {
        axios.defaults.headers.common['Authorization'] = `Bearer ${window.localStorage.getItem('auth')}`;
    }
}