import React, { useState, useEffect } from "react";
import axios from 'axios';
import Link from "next/link";
import { useRouter } from "next/router";

function Navbar() {
  const Router = useRouter();
  const [navBar, setNavBar] = useState([]);
  
  const Path = (Name: string) => {
    if (Name === "BRANDING") return Router.query.category;
    else if (Name === "EDITORIAL") return Router.query.category;
    else if (Name === "ADVERTISING") return Router.query.category;
  };
  const getNavBar = async () =>{
    const request = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/work-category.json`)
    .then((response)=>{
      //console.log(response);
      setNavBar(response.data.data);
    })
    .catch((error)=>{
      console.log(error);
    });
    return request;
  };
  useEffect(() => {
    getNavBar();
  }, []);
  return (
    <div className="flex justify-center h-[45px] items-center md:gap-[30px] gap-6">
      {navBar?.map((item: any, index: number) => {
        return (
          <Link
            key={index}
            href={'/work/category/'+item.slug}
            className={`font-Grotesque md:text-[13px] text-[10px] md:leading-[45px] leading-[20px] tracking-[5%] Custom-Hover-Cursor ${
              Router.query.category === item.slug
                ? "text-black font-normal"
                : "text-offGray font-[200]"
            } uppercase text-start`}
          >
            {item.title}
          </Link>
        );
      })}
    </div>
  );
}

export default Navbar;
