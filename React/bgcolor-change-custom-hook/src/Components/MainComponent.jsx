import React from 'react'
import UseChangeColor from './UseChangeColor';
export default function MainComponent() {

    const divStyle = {
        margin: '0',
        position: 'absolute',
        top: '50%',
        left: '50%',
        transform: 'translate(-50%, -50%)',
        fontWeight: 'bold',
        backgroundColor:UseChangeColor('blue'),
        padding:'400px 600px',
    };

    return (
        <div style={divStyle}>Background color will change every 5 seconds</div>
    )
}