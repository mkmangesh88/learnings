import React, { useRef, useState } from "react";
import '../App.css';
export default function AlphabetCounter() {

    const [finalResult, setFinalResult] = useState([]);
    const inpRef = useRef(null);

    const calculate = () => {
        let inputData = inpRef.current.value;

        inputData = inputData.replace(/\W/g, '');
        inputData = inputData.toLowerCase();
        let inputDataArr = [...inputData];

        let resultArr = {};
        
        inputDataArr && inputDataArr.length && inputDataArr.map( char => {
            if( resultArr[char] ) {
                resultArr[char] = resultArr[char]+1;
            } else {
                resultArr[char] = 1;
            }
        })
        setFinalResult(resultArr);
    }

    return (
        <div className="main">
            <h1> Alphabet Calculator </h1>
            <input type="text" name="inpString" ref={inpRef} placeholder="String to calculate alphabet"/>
            <input type="button" value="Count" className="btn-submit" onClick={()=>calculate()} />
            <div className="result">
                <ul>
                    {
                    Object.keys(finalResult).map( value => {
                        return <li><span>{value}</span> : <span>{finalResult[value]}</span></li>
                    })
                    }
                </ul>
            </div>
        </div>
    );
}