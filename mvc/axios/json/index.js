document.getElementById('btn').addEventListener('click',makereq);
// function makereq(){
//     config = {
//         method:'GET',
//         url:'data1.txt'
//     }
//     const pObj = axios(config);
//     pObj.then(res=>{
        
//         console.log(res.data);
//     })
// }

async function makereq(){
    const res = await axios.get('data.json')
    console.log(res.data);
    console.log(res.data.name);
    console.log(res.data.roll);
}