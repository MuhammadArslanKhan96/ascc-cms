import React, { useEffect, useState } from 'react';
// import component 👇
import Drawer from 'react-modern-drawer';
//import styles 👇
import 'react-modern-drawer/dist/index.css';
import SVG from '../../../SVG/SVG';
import TimerWidget from '../../Common/TimerTeller/TimerWidget';
import Image from 'next/image';
import { Data } from '../../../JSON/Data';
import Link from 'next/link';
import { useRouter } from 'next/router';

interface Props {
  State: boolean;
  Event: () => void;
  EventCreative: () => void;
  EventArtist: () => void;
  content: any
  globalInfo:any
}

const Index: React.FC<Props> = ({
  State,
  Event,
  EventCreative,
  EventArtist,
  content,
  globalInfo,
}: Props) => {
  const Router = useRouter();
  const [CheckPhone, SetCheckPhone] = useState("");
  useEffect(() => {
    if (typeof window.orientation !== "undefined") {
      SetCheckPhone("Phone");
    } else SetCheckPhone("Desktop");
  }, [State]);

  return (
    <div className="w-full">
      <Drawer
        open={State}
        onClose={Event}
        enableOverlay={false}
        direction="left"
        className="drawers-main bg-OffWhite"
      >
        {/* Cross Bar */}
        <div
          className={`w-full md:h-[100px] h-[54px] flex justify-between items-center md:px-10 px-4 `}
        >
          <button
            onClick={() => {
              Event();
              EventCreative();
            }}
            className={`font-Eurostile font-[400] md:text-[20px] text-[12px] leading-[18.4px] tracking-[5%] uppercase inline-block text-black after:content-[''] after:block after:h-[1px] after:bg-black after:transition-all after:duration-150 after:w-full Custom-Hover-Cursor`}
          >
            CREATIVE
          </button>
          <Link
            className=" Custom-Hover-Cursor relative w-[48px] h-[48px] md:hidden"
            href={'/'}
          >
            <Image src={'/logo.gif'} alt="logo" fill />
          </Link>

          <button
            onClick={() => {
              Event();
              EventCreative();
            }}
            className={`md:w-[30px] w-[15px] md:h-[30px] h-[15px] relative Custom-Hover-Cursor md:block `}
          >
            <SVG.Cross />
          </button>
        </div>
        <div
          className={`w-full md:h-[calc(100vh-100px)] ${
            CheckPhone === 'Phone'
              ? 'h-[calc(100vh-145px)] '
              : 'h-[calc(100vh-54px)]'
          } overflow-x-hidden md:flex justify-between items-center flex-col md:px-10 px-4 pb-7 md:mt-0 mt-4`}
        >
          <div className="w-full md:h-[calc(100%-40px)] h-[calc(100%-70px)] overflow-auto md:pb-7 md:pt-0 pt-4">
            <h3 className="font-Eurostile font-semibold text-black md:text-[20px] text-[12px] md:leading-[55px] leading-[22px] tracking-[1.5%] uppercase">
              About
            </h3>
            <div className="font-Grotesque font-[300] text-black md:text-[13px] text-[10px] md:leading-[30px] leading-[18px] md:tracking-[1.5%] tracking-[7.5%] md:mt-0 mt-4">
              {content?.map((item: any, index: number) => {
                  return item.title === "About" ? (
                    <div key={index} dangerouslySetInnerHTML={{__html:  item.about}} />
                  ) : ''
                })}
              
            </div>
            <h3 className="font-Eurostile font-semibold text-black md:text-[20px] text-[12px] md:leading-[55px] leading-[22px] tracking-[1.5%] uppercase mt-4">
              Contact
            </h3>
            <div className="font-Grotesque font-[300] text-black md:text-[13px] text-[10px] md:leading-[30px] leading-[18px] md:tracking-[1.5%] tracking-[7.5%] md:mt-0 mt-4" dangerouslySetInnerHTML={{__html: globalInfo.address}} >
              
            </div>
            <div className="font-Grotesque font-[300] text-black md:text-[13px] text-[10px] md:leading-[30px] leading-[18px] md:tracking-[1.5%] tracking-[7.5%] md:mt-0 mt-4" >
              
              {globalInfo.studioEmail} <br/>
              {globalInfo.careerEmail}
            </div>
            <div className="flex md:gap-6 gap-5 mt-2 md:pb-0">
              {globalInfo.facebookURL !=null && 
                 <a
                    key={'facebook'}
                    href={globalInfo.facebookURL}
                    className="md:w-[32px] w-[20px] md:h-[32px] h-[20px] relative"
                  >
                    <Image
                      src={'/facebook.svg'}
                      alt=""
                      fill
                      className="object-cover"
                    />
                </a>
              }
              {globalInfo.instagramURL !=null && 
                 <a
                    key={'instagram'}
                    href={globalInfo.instagramURL}
                    className="md:w-[32px] w-[20px] md:h-[32px] h-[20px] relative"
                  >
                    <Image
                      src={'/instagram.svg'}
                      alt=""
                      fill
                      className="object-cover"
                    />
                </a>
              }
              { globalInfo.messageURL !=null && 
                 <a
                    key={'message'}
                    href={globalInfo.messageURL}
                    className="md:w-[32px] w-[20px] md:h-[32px] h-[20px] relative"
                  >
                    <Image
                      src={'/message.svg'}
                      alt=""
                      fill
                      className="object-cover"
                    />
                </a>
              }
            </div>
          </div>
          <div
            className={` w-full md:h-[40px] h-[50px] flex items-center mt-3 md:mt-0 md:items-start flex-col`}
          >
            <TimerWidget />
          </div>
        </div>
      </Drawer>
      <Drawer
        open={State}
        onClose={Event}
        enableOverlay={false}
        direction="right"
        style={{ width: '50%', height: '100vh' }}
        className="drawers-main drawers"
      >
        <div className="relative w-full h-full">
          {content?.map((item: any, index: number) => {
            return item.title === "About" ? (
              <Image key={index} src={item.rightImage[0].url} alt="" fill className="object-cover" />
            ) : ''
          })}
          
          <div
            className={`w-full h-[100px] flex justify-end items-center md:px-10 px-4 absolute Custom-Hover-Cursor z-10`}
          >
            <button
              onClick={() => {
                Event();
                EventArtist();
              }}
              className={`font-Eurostile font-[400] md:text-[20px] text-[16px] leading-[18.4px] text-OffWhite tracking-[5%] uppercase Custom-Hover-Cursor border-b-2 border-b-transparent hover:border-b-OffWhite`}
            >
              ARTISTS
            </button>
          </div>
        </div>
      </Drawer>
    </div>
  );
};

export default Index;
