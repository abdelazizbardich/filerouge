
const auth = (data,p)=>{
    if(!localStorage.getItem('token')){
        window.location.href = "/login"
        return false
    }
    data.next()
}
export default auth
