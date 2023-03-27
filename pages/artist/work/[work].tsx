import { NextPage } from "next";
import React from "react";
import axios from 'axios';
import ArtistProjectDetails from "../../../components/Artists/ArtistWork/ArtistProjectDetails";
import PageTransition from "../../../components/PageTransition";
interface Props {
  artistwork:any;
};
const DetailedProject: NextPage<Props> = ({artistwork}: Props) => {
  //console.log(artistwork);
  return <>
      <PageTransition />
      <ArtistProjectDetails artistwork = {artistwork.data[0]}/>
    </>
};
 export async function getStaticPaths() {
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/allwork.json`);
  
  const works = await res.json();
  const paths = works.data?.map((work:any,Index:number) => ({
    params: { work: work.slug.toString() },
  }));
  //const paths = { params: { work: 'test'.toString() } };
  return { paths, fallback: false }
}
export async function getStaticProps(props:{ params:any }) {
  // Call an external API endpoint to get posts.
  // You can use any data fetching library
  const { params } = props;
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/artistwork/${params.work}.json`)
  const artistwork = await res.json()
  console.log(artistwork);
  return {
    props: {
      artistwork,
    },
  }
}
export default DetailedProject;
