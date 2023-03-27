import React, { useEffect, useRef, useState } from "react";
import axios from 'axios';
import Link from 'next/link';
import Image from 'next/image';
import { useRouter } from 'next/router';
import TimerWidget from '../../Common/TimerTeller/TimerWidget';
import { Slide, Zoom, Fade } from 'react-awesome-reveal';
import HoverImage from './FadeAnimation/IMG';
import SVG from '../../../SVG/SVG';
import About from '../../Creative/TheAgency/Index';

// import component 👇
import Drawer from 'react-modern-drawer';
//import styles 👇
import 'react-modern-drawer/dist/index.css';
import { Data } from '../../../JSON/Data';
import { motion } from 'framer-motion';

const Navigation: React.FC = () => {
  const Router = useRouter();
  const [CheckPhone, SetCheckPhone] = useState('');
  const [OpenCreative, setOpenCreative] = React.useState(false);
  const [OpenArtists, setOpenArtists] = React.useState(false);
  const [leftMenu, setLeftMenu] = React.useState([]);
  const [rightMenu, setRightMenu] = React.useState([]);
  const [globalInfo, setGlobalInfo] = React.useState([]);
  const toggleCreativeDrawer = () => {
    setOpenCreative((prevState) => !prevState);
  };

  const toggleArtistsDrawer = () => {
    setOpenArtists((prevState) => !prevState);
  };
  const ShowLogo = () => {
    if (Router.pathname === '/' || Router.query.work) return false;
    else return true;
  };
  const CreativeActive = () => {
    if (
      Router.pathname === '/creative/agency' ||
      Router.pathname === '/creative/work' ||
      Router.pathname === '/creative/clients' ||
      Router.pathname === '/creative/work/editorial' ||
      Router.pathname === '/creative/work/motion' ||
      Router.pathname === '/creative/work/advertising' ||
      Router.pathname === '/creative/work/branding' ||
      Router.query.editorial ||
      Router.query.advertising ||
      Router.query.branding
    )
      return true;
    else return false;
  };
  const ArtistActive = () => {
    if (Router.query.artist || Router.query.work) return true;
    else return false;
  };

  const [Show, setShow] = useState(false);
  const [lastScrollY, setLastScrollY] = useState(0);
  const controlNavbar = () => {
    if (typeof window !== 'undefined') {
      if (window.scrollY < lastScrollY) {
        setShow(false);
      } else {
        setShow(true);
      }
      setLastScrollY(window.scrollY);
    }
  };

  useEffect(() => {
    if (
      OpenAbout ||
      OpenCreative ||
      OpenArtists ||
      Router.pathname === '/' ||
      Router.query.editorial ||
      Router.query.advertising ||
      Router.query.branding ||
      Router.query.work
    )
      document.body.style.overflow = 'hidden';
    else document.body.style.overflow = 'auto';

    return () => {
      // 👇️ optionally remove styles when component unmounts
      document.body.style.overflow = 'auto';
    };

    // if (typeof window !== "undefined") {
    //   window.addEventListener("scroll", controlNavbar);
    //   return () => {
    //     window.removeEventListener("scroll", controlNavbar);
    //   };
    // }
  });

  useEffect(() => {
    if (typeof window.orientation !== 'undefined') {
      SetCheckPhone('Phone');
    } else SetCheckPhone('Desktop');
  }, [OpenCreative]);

  const [OpenAbout, setOpenAbout] = React.useState(false);
  const SetAbout = () => {
    setOpenAbout(!OpenAbout);
  };

  const [ActiveImageIndexForCreative, SetCreativeIndex] = useState<number>(0);
  const [ActiveImageIndexForArtist, SetArtistIndex] = useState<number>(0);

  useEffect(() => {}, [OpenAbout, OpenCreative, OpenArtists, Router]);
  const getLeftMenu = async () =>{
    const request = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/leftmenu.json`)
    .then((response)=>{
      //console.log(response);
      setLeftMenu(response.data.data[0].leftmenu);
    })
    .catch((error)=>{
      console.log(error);
    });
    return request;
  };
  const getRightMenu = async () =>{
    const request = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/rightmenu.json`)
    .then((response)=>{
      
      setRightMenu(response.data.data[0].rightmenu);
    })
    .catch((error)=>{
      console.log(error);
    });
    return request;
  };
  const getGlobalInfo = async () =>{
    const request = await axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/global.json`)
    .then((response)=>{
      //console.log(response);
      setGlobalInfo(response.data.data[0]);
    })
    .catch((error)=>{
      console.log(error);
    });
    return request;
  };
  useEffect(() => {
    getLeftMenu(); 
    getRightMenu();
    getGlobalInfo();
  }, []);
  return (
    <React.Fragment>
      <div
        className={`iphone-area w-full bg-OffWhite md:h-[100px] h-[54px] md:px-10 px-4 md:py-7 ${
          Router.query.work ? 'md:flex hidden' : 'flex'
        } justify-between items-center sticky top-0 z-10 transition-all duration-500 ease-linear`}
      >
        <button
          onClick={toggleCreativeDrawer}
          className={`font-Eurostile font-[400] md:text-[20px] text-[12px] md:leading-[18.4px] leading-[11.04px] tracking-[5%] uppercase ${
            CreativeActive() ? 'after:w-full' : ''
          } hover-underline-animation`}
        >
          CREATIVE
        </button>
        {ShowLogo() && (
          <Link
            className=" Custom-Hover-Cursor relative md:w-[80px] w-[48px] md:h-[80px] h-[48px] "
            href={'/'}
          >
            <Image src={'/logo.gif'} alt="logo" fill />
          </Link>
        )}
        <button
          onClick={toggleArtistsDrawer}
          className={`font-Eurostile font-[400] md:text-[20px] text-[12px] md:leading-[18.4px] leading-[11.04px] tracking-[5%] uppercase ${
            ArtistActive() ? 'after:w-full' : ''
          } hover-underline-animation`}
        >
          ARTISTS
        </button>
      </div>

      {/* Creative hamburger*/}
      <div className="w-full">
        <Drawer
          open={OpenCreative}
          onClose={toggleCreativeDrawer}
          enableOverlay={false}
          direction="left"
          className="drawers-main bg-OffWhite"
          duration={1000}
        >
          <div className="w-full h-full flex justify-start item-center flex-col bg-OffWhite">
            {/* Cross Bar */}
            <div
              className={`w-full md:h-[100px] h-[54px] flex justify-between items-center md:px-10 px-4 `}
            >
              <button
                onClick={toggleCreativeDrawer}
                className={`font-Eurostile font-[400] md:text-[20px] text-[12px] md:leading-[18.4px] tracking-[5%] uppercase inline-block text-black after:content-[''] after:block after:h-[1px] after:bg-black after:transition-all after:duration-150 hover:after:w-full Custom-Hover-Cursor`}
              >
                CREATIVE
              </button>
              <button
                onClick={toggleCreativeDrawer}
                className={`md:w-[30px] w-[15px] md:h-[30px] h-[15px] relative Custom-Hover-Cursor`}
              >
                <SVG.Cross />
              </button>
            </div>
            <div
              className={`w-full md:h-[calc(100vh-100px)] ${
                CheckPhone === 'Phone'
                  ? 'h-[calc(100vh-160px)]'
                  : 'h-[calc(100vh-54px)]'
              } flex justify-between items-start flex-col md:px-10 px-4 pb-0 md:pb-7`}
            >
              <div className="w-full flex justify-start items-start flex-col md:gap-6 gap-[18px] pt-2">
                {leftMenu?.map((item: any, index: number) => {
                  return item.title === 'About' ? (
                    <Slide
                      direction="up"
                      className="overflow-hidden"
                      key={index}
                    >
                      <button
                        onClick={() => {
                          toggleCreativeDrawer();
                          setOpenAbout(true);
                        }}
                        onMouseOver={() => SetCreativeIndex(index)}
                        className="font-Eurostile font-[700] md:text-[25px] text-[16px] leading-[16px] tracking-[-2%] hover:text-gray-500 text-black ease-in-out uppercase pt-2 text-start Custom-Hover-Cursor"
                      >
                        {item.title}
                      </button>
                    </Slide>
                  ) : (
                    <Slide
                      direction="up"
                      className="overflow-hidden"
                      key={index}
                    >
                      <Link
                        onClick={toggleCreativeDrawer}
                        onMouseOver={() => SetCreativeIndex(index)}
                        href={item.url}
                        className="hover:text-gray-500 text-black ease-in-out font-Eurostile font-[700] md:text-[25px] text-[16px] leading-[16px] tracking-[-2%] uppercase text-start Custom-Hover-Cursor"
                      >
                        {item.title}
                      </Link>
                    </Slide>
                  );
                })}
              </div>
              <div
                className={`${
                  CheckPhone === 'Phone' ? 'pb-7' : 'pb-0'
                } w-full md:h-[40px] h-[50px] flex items-center mt-3 md:mt-0 md:items-start flex-col`}
              >
                <TimerWidget />
              </div>
            </div>
          </div>
        </Drawer>
        <Drawer
          open={OpenCreative}
          onClose={toggleCreativeDrawer}
          enableOverlay={false}
          direction="right"
          duration={1000}
          style={{ width: '50%', height: '100vh' }}
          className="drawers-main drawers overflow-hidden bg-OffWhite"
        >
          <div className="w-full h-full">
            {leftMenu?.map((item: any, index: number) => {
              return (
                <Image
                  key={index}
                  src={item.rightImage[0].url}
                  alt=""
                  fill
                  className={`object-cover ${
                    index === ActiveImageIndexForCreative
                      ? "ActiveImage"
                      : "DeactiveImage"
                  }`}
                />
              );
            })}
            {/* Cross Bar */}
            <div
              className={`w-full h-[100px] flex justify-end items-center md:px-10 px-4 absolute Custom-Hover-Cursor`}
            >
              <button
                onClick={() => {
                  setOpenCreative(false);
                  setOpenArtists(true);
                }}
                className={` font-Eurostile font-[400] md:text-[20px] text-[16px] leading-[18.4px] tracking-[5%] uppercase inline-block text-OffWhite after:content-[''] after:block after:h-[1px] after:bg-OffWhite after:transition-all after:duration-150 after:w-0 hover:after:w-full Custom-Hover-Cursor`}
              >
                ARTISTS
              </button>
            </div>
          </div>
        </Drawer>
      </div>

      {/* Artist hamburger */}
      <div className="w-full bg-OffWhite">
        <Drawer
          duration={1000}
          open={OpenArtists}
          onClose={toggleArtistsDrawer}
          enableOverlay={false}
          direction="left"
          className="drawers-main drawers"
        >
          <div className="w-full h-full flex justify-center item-center nav-image">
            {rightMenu?.map((item: any, index: number) => {
              return (
                <Image
                  key={index}
                  src={item.profileImage}
                  alt=""
                  fill
                  className={`object-cover ${
                    index === ActiveImageIndexForArtist
                      ? "ActiveImage"
                      : "DeactiveImage"
                  }`}
                />
              );
            })}
            <div
              className={`w-full h-[100px] flex justify-start items-center md:px-10 px-4 absolute Custom-Hover-Cursor`}
            >
              <button
                onClick={() => {
                  setOpenArtists(false);
                  setOpenCreative(true);
                }}
                className={`font-Eurostile font-[400] md:text-[20px] text-[12px] md:leading-[18.4px] tracking-[5%] uppercase inline-block text-OffWhite after:content-[''] after:block after:h-[1px] after:bg-OffWhite after:transition-all after:duration-150 after:w-0 hover:after:w-full Custom-Hover-Cursor`}
              >
                CREATIVE
              </button>
            </div>
          </div>
        </Drawer>
        <Drawer
          duration={1000}
          open={OpenArtists}
          onClose={toggleArtistsDrawer}
          enableOverlay={false}
          direction="right"
          className="drawers-main bg-OffWhite"
        >
          {/* Cross Bar */}
          <div
            className={`w-full md:h-[100px] h-[54px] flex justify-between items-center md:px-10 px-4 bg-OffWhite`}
          >
            <button
              onClick={toggleArtistsDrawer}
              className={`md:w-[30px] w-[15px] md:h-[30px] h-[15px] relative Custom-Hover-Cursor`}
            >
              <SVG.Cross />
            </button>
            <button
              onClick={toggleArtistsDrawer}
              className={`font-Eurostile font-[400] md:text-[20px] text-[12px] leading-[18.4px] tracking-[5%] uppercase inline-block text-black after:content-[''] after:block after:h-[1px] after:bg-black after:transition-all after:duration-150 after:w-full Custom-Hover-Cursor`}
            >
              ARTISTS
            </button>
          </div>
          <div
            className={`w-full md:h-[calc(100vh-100px)] h-[calc(100vh-54px)] flex justify-start items-end flex-col md:px-10 px-4 pb-4 pt-2 md:gap-[20px] gap-[8px] bg-transparent`}
          >
            {rightMenu?.map((item: any, index: number) => {
              return (
                <div key={index} className="text-right">
                  <motion.h1
                    key={OpenArtists.toString()}
                    initial={{ y: 90, opacity: 1 }}
                    animate={{ y: 0, opacity: 1 }}
                    exit={{ y: 0, opacity: 0 }}
                    transition={{
                      duration: 0.8,
                      // delay: 0.2,
                      ease: [0.2, 0.2, 0.6, 1],
                    }}
                  >
                    <Link
                      onClick={toggleArtistsDrawer}
                      onMouseOver={() => SetArtistIndex(index)}
                      // href={`${item.Route}?Title=${item.Title}`}
                      href={{
                        pathname: `/artist/${item.slug}`,
                        query: { Title: item.title, Tab: "work" },
                      }}
                      className="font-Eurostile font-[600] whitespace-nowrap md:text-[25px] text-[18px] leading-[20px] tracking-[-2%] text-black uppercase text-start Custom-Hover-Cursor"
                    >
                      {item.title}
                    </Link>
                    <p className="font-Grotesque font-[300] md:text-[13px] text-[8px] md:leading-[20px] leading-[12px] tracking-[0.5%] text-black uppercase">
                      {item.category}
                    </p>
                  </motion.h1>
                </div>
              );
            })}
          </div>
        </Drawer>
      </div>

      {/* Open About */}
      <About
        State={OpenAbout}
        Event={SetAbout}
        EventCreative={toggleCreativeDrawer}
        EventArtist={toggleArtistsDrawer}
        content={leftMenu}
        globalInfo={globalInfo}
      />
    </React.Fragment>
  );
};

export default Navigation;
