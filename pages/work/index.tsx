import { NextPage } from "next";
import React,{ useEffect, useState } from "react";
import axios from 'axios';
import Work from "../../components/Work/Work"
import PageTransition from "../../components/PageTransition";
import Navbar from "../../components/Work/Navbar";
import Seo from '../../components/Global/Seo/Seo';

const work: NextPage = () => {
  const [allWork, setAllWork] = React.useState([]);
  const [seoData, setSeoData] = useState([]);
  const getAllWork = async () =>{
    const request = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/work.json`)
    .then((response)=>{
      //console.log(response);
      setAllWork(response.data.data[0].work.caseStudies);
      setSeoData(response.data.data[0].seo);
    })
    .catch((error)=>{
      console.log(error);
    });
    return request;
  };
  useEffect(() => {
    getAllWork(); 
  }, []);
  return (
    <>
      <Seo seoData={seoData} />
      <PageTransition />
      <div className="w-full md:px-8 px-4">
        <Navbar />
      </div>
      <Work workData={allWork}/>
    </>
  );
}

export default work;
