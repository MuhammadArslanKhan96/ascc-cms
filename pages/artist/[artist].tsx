import { NextPage } from "next";
import React,{ useEffect, useState } from "react";
import axios from 'axios';
import Artists from "../../components/Artists/Index";
import PageTransition from "../../components/PageTransition";
import Seo from '../../components/Global/Seo/Seo';
interface Props {
  artist:any;
};
const Index: NextPage<Props> = ({artist}: Props) => {
  const [artistDetail, setArtistDetail] = React.useState({});

  return <>
      <Seo seoData={artist.data[0].seo} />
      <PageTransition />
      {artist && 
        <Artists artist={artist} />
      }
  </>
}

export async function getStaticPaths() {
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/allartists.json`);
  
  const artists = await res.json();
  const paths = artists.data?.map((artist:any,Index:number) => ({
    params: { artist: artist.url.toString() },
  }));
  return { paths, fallback: false }
}
export async function getStaticProps(props:{ params:any }) {
  // Call an external API endpoint to get posts.
  // You can use any data fetching library
  const { params } = props;
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/api/artist/${params.artist}.json`)
  const artist = await res.json()
  console.log(artist);
  return {
    props: {
      artist,
    },
  }
}
export default Index;
