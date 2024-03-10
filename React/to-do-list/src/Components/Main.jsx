import React,{useRef, useState} from 'react'
export const Main = () => {

    const defaultItems = [{
        id: 1,
        title: 'Meet with Geet',
        description : 'Call is set at 10:30 in the morning',
        done: true
    },{
        id: 2,
        title: 'Dev focus time',
        description : 'Work on project #F-1211',
        done: false
    },{
        id: 3,
        title: 'Sync call',
        description : 'Team sync call at 14:30',
        done: false
    }]
    const [list, setList] = useState(defaultItems)  
    const titleRef = useRef();
    const descRef = useRef();

    const addToDO = (event) => {
        let idTemp =  Number(list.length) + 1

        let listData = [...list]
        listData.push( {
            id: idTemp,
            title: titleRef.current.value,
            description: descRef.current.value
        } )
        console.log(listData)
        setList(listData);

        
    }

    return (
    <div style={{border:'2px'}}>
        <h1>To do List</h1>
    <ol>
        {list.map(item => {
            return (<li key={item.id} 
                style={{
                    justifyContent:'left',
                    display:'flex',
                    padding:'5px',
                    textDecoration: item.done?'line-through':''
                     }}>
                <label>
                    <input type='checkbox' name='isDone' checked={item.done} disabled={item.done} />
                    <span style={{fontWeight:'bold'}}> {item.title} </span>
                    <span>{item.description}</span>
                </label>
            </li>)
        })
        }
        <li key={Math.random()} 
                style={{
                    justifyContent:'left',
                    display:'flex',
                    padding:'5px',
                    margin: '10px'
                     }}>
                <label>
                    <input type='text' name='title' ref={titleRef} />
                    <input type='text' name='description' ref={descRef} />
                    <button onClick={addToDO}>Add To Do</button>
                </label>
            </li>
    </ol>
    </div>
  )
}
