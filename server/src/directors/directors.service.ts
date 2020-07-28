import {HttpException, HttpStatus, Injectable} from '@nestjs/common';
import {InjectRepository} from "@nestjs/typeorm";
import {Repository} from "typeorm";
import {Reziser} from "../entity/Reziser.entity";

@Injectable()
export class DirectorsService {
    constructor(
        @InjectRepository(Reziser)
        private directorsRepository: Repository<Reziser>,
    ) {}

    async create(reziser:Reziser) : Promise<Reziser>{

        const r = await this.directorsRepository.findOne({where: { imeRezisera: reziser.imeRezisera, prezimeRezisera: reziser.prezimeRezisera }});

        if (!r){
            return await this.directorsRepository.save(reziser);
        }

        return r;
    }
}
