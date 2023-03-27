import { NextPage } from "next";
import React,{ useEffect, useState } from "react";
import axios from 'axios';
import EditorialDetails from "../../components/Work/ProjectDetail";
import PageTransition from "../../components/PageTransition";
import Seo from '../../components/Global/Seo/Seo';
interface Props {
  work:any;
};
const advertising: NextPage<Props> = ({work}: Props) => {
  //console.log(work);
  const [projectDetail, setProjectDetail] = React.useState([]);
  return (
    <>
      <Seo seoData={work.data[0].work.seo} />
      <PageTransition />
      <EditorialDetails projectDetail={work.data[0].work} slug={work.data[0].work.slug} />
    </>
  );
};
export async function getStaticPaths() {
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/work.json`);
  
  const works = await res.json();
  // console.log(works.data);
  // console.log(works.data[0].work);
  const paths = works.data[0].work.caseStudies?.map((work:any) => ({
    params: { work: work.slug.toString() },
  }));
//const paths = { params: { work: 'test'.toString() } };
  return { paths, fallback: false }
}
export async function getStaticProps(props:{ params:any }) {
  // Call an external API endpoint to get posts.
  // You can use any data fetching library
  const { params } = props;
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/work/${params.work}.json`)
  const work = await res.json()

  return {
    props: {
      work,
    },
  }
}
export default advertising;
