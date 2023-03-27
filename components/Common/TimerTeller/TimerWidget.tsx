import React, { useEffect, useRef, useState } from 'react';
import { DateTime } from 'luxon';

const TimerWidget: React.FC = () => {
  const [times, setTimes] = useState(Array<any>);
  const colonRef = useRef(true);
  const intervalRef = useRef<any>({});

  const timeForZone = (zone: any) => {
    return DateTime.fromObject({}, { zone }).toFormat(
      colonRef.current ? 'hh:mm a' : 'hh mm a'
    );
  };

  const createTimes = () => {
    setTimes([
      {
        label: 'Shanghai',
        time: timeForZone('Asia/Shanghai'),
      },
      {
        label: 'Tokyo',
        time: timeForZone('Asia/Tokyo'),
      },
      {
        label: 'Seoul',
        time: timeForZone('Asia/Seoul'),
      },
      {
        label: 'London',
        time: timeForZone('Europe/London'),
      },
      {
        label: 'Paris',
        time: timeForZone('Europe/Paris'),
      },
      {
        label: 'New York',
        time: timeForZone('America/New_York'),
      },
    ]);
  };

  useEffect(() => {
    createTimes();

    intervalRef.current = setInterval(() => {
      colonRef.current = !colonRef.current;
      createTimes();
    }, 1000);

    return () => {
      clearInterval(intervalRef.current);
    };
  }, [setTimes]);

  const [device, setDevice] = useState('');

  useEffect(() => {
    setDevice(window.navigator.platform);
  }, []);
  return (
    <footer
      className={`h-14 md:h-20  w-full flex justify-between md:justify-start items-center md:gap-7 `}
    >
      {times.map(({ label, time }, k) => {
        return (
          <div
            className="flex-none flex-grow-0  justify-center items-start flex-col flex-wrap"
            key={k}
          >
            <h4 className="tracking-tighter md:tracking-normal font-Grotesque md:font-normal md:text-[13px] text-[11px] leading-[20px] text-black text-start uppercase ">
              {label}
            </h4>
            <p className="tracking-tighter font-Grotesque  font-[200] md:text-[13px] text-[10px] leading-[20px] text-black text-start ">
              {time}
            </p>
          </div>
        );
      })}
    </footer>
  );
};

export default TimerWidget;
