import { useEffect, useState } from 'react'

export default function UseChangeColor( initialColor ) {

    const [color, setColor] = useState(initialColor)
    const colorArr = [
        '#EFA8E4',
        '#F8E1F4',
        '#F1F7F7',
        '#FFDDAA',
        '#FFFFE3',
        '#DAB0FF'
    ];

useEffect(()=> {
    setInterval(()=> {
        let curColor = Math.floor( Math.random()*colorArr.length );
        setColor(colorArr[curColor])
    },5000);

}, [])

return color
}