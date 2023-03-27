import { NextPage } from "next";
import React,{ useEffect, useState } from "react";
import axios from 'axios';
import PageTransition from "../../../components/PageTransition";
import Navbar from "../../../components/Work/Navbar";
import Work from "../../../components/Work/Work";
import Seo from '../../../components/Global/Seo/Seo';

interface Props {
  work:any;
};
const advertising: NextPage<Props> = ({work}: Props) => {
  //console.log(work);
  return (
    <>
      {work.data[0] && 
        <Seo seoData={work.data[0].seo} />
      }
      <PageTransition />
      <div className="w-full md:px-8 px-4">
        <Navbar />
      </div>
      <Work workData={work.data}/>
    </>
  );
};
export async function getStaticPaths() {
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/work-category.json`);
  
  const works = await res.json();
  console.log(works);
  const paths = works.data?.map((work:any) => ({
    params: { category: work.slug.toString() },
  }));
  //const paths = { params: { category: 'branding'.toString() } };
  return { paths, fallback: false }
}
export async function getStaticProps(props:{ params:any }) {
  
  const { params } = props;
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/work-category/${params.category}.json`);
  const work = await res.json()

  return {
    props: {
      work,
    },
  }
}
export default advertising;
