import { NextPage } from "next";
import React,{ useEffect, useState } from "react";
import axios from 'axios';
import Image from "next/image";
import Seo from '../../components/Global/Seo/Seo';

const clients: NextPage = () => {
  const [clientLogos, setClientLogos] = React.useState([]);
  const [seoData, setSeoData] = useState([]);
  const getClientLogo = async () =>{
    const request = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/clients.json`)
    .then((response)=>{
      //console.log(response);
      setClientLogos(response.data.data[0].clients.clientLogos);
      setSeoData(response.data.data[0].seo);
    })
    .catch((error)=>{
      console.log(error);
    });
    return request;
  };
  useEffect(() => {
    getClientLogo(); 
  }, []);
  return (
    <>
    <Seo seoData={seoData} />
    <div className="w-full md:h-[calc(100vh-100px)] bg-OffWhite">
      <div className="w-full max-w-[1360px] m-auto md:px-8 px-4 py-4 flex justify-center items-center flex-col">
        {/* <h1 className="font-Eurostile font-bold md:text-[54px] text-[20px] md:leading-[45px] leading-[55px] text-black uppercase ">
          CLIENTS
        </h1> */}
        <section className="w-full grid md:grid-cols-5 grid-cols-3 md:grid-rows-6 grid-rows-6 md:gap-8 gap-6 md:mt-5 ">
          {clientLogos?.map((item :any ,index: number) => {
            return (
              <div key={"client"+index} className="relative md:w-[50%] w-[70%] m-auto min-h-[77.46px] ">
                <Image
                  
                  src={item.url}
                  alt="client-logo"
                  fill
                  className="object-contain"
                />
              </div>
            );
          })}
        </section>
      </div>
    </div>
    </>
  );
}

export default clients;
